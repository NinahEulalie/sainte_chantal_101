<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Classe;
use App\Models\AnneeScolaire;
use App\Models\AffectationsParClasse;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index(Request $request)
    {
        // Récupérer l'année scolaire active
        $anneeActive = AnneeScolaire::where('active', 1)->first();

        if (!$anneeActive) {
            return redirect()->back()->with('error', 'Aucune année scolaire active trouvée.');
        }

        // Récupérer tous les niveaux disponibles (primaire, collège, lycée)
        $niveaux = Classe::select('niveau')->distinct()->orderBy('niveau')->pluck('niveau');

        // Récupérer le niveau sélectionné (sans valeur par défaut si non spécifié)
        $niveauSelectionne = $request->get('niveau');

        // Si aucun niveau n'est sélectionné, prendre le premier disponible
        if (!$niveauSelectionne && $niveaux->isNotEmpty()) {
            $niveauSelectionne = $niveaux->first();
        }

        // Récupérer le nom de classe sélectionné (ex: "9ème", "3ème")
        $nomClasseSelectionne = $request->get('nom_classe');

        // Récupérer toutes les classes du niveau sélectionné
        $classesDisponibles = [];
        if ($niveauSelectionne) {
            $classesDisponibles = Classe::where('niveau', $niveauSelectionne)
                ->orderBy('nom_classe')
                ->get();
        }

        // Extraire les noms de classe uniques (9ème, 3ème, etc.) pour ce niveau
        $nomsClasses = $classesDisponibles->map(function($classe) {
            // Extraire juste "9ème" de "9ème A" ou "3ème" de "3ème B"
            preg_match('/^([^\s]+)/', $classe->nom_classe, $matches);
            return $matches[1] ?? $classe->nom_classe;
        })->unique()->values();

        // Si aucun nom de classe sélectionné, prendre le premier
        if (!$nomClasseSelectionne && $nomsClasses->isNotEmpty()) {
            $nomClasseSelectionne = $nomsClasses->first();
        }

        // Filtrer les classes parallèles (9ème A, 9ème B, 9ème C)
        $classes = collect();
        if ($nomClasseSelectionne) {
            $classes = $classesDisponibles->filter(function($classe) use ($nomClasseSelectionne) {
                return str_starts_with($classe->nom_classe, $nomClasseSelectionne);
            });
        }

        // Récupérer tous les élèves NON ENCORE affectés pour cette année
        $elevesNonAffectes = Eleve::whereNotExists(function ($query) use ($anneeActive) {
                $query->select('id_eleve')
                    ->from('affectations_par_classes')
                    ->whereColumn('eleves.id_eleve', 'affectations_par_classes.id_eleve')
                    ->where('affectations_par_classes.id_annee', $anneeActive->id_annee);
            })
            ->with('parent')
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        // Récupérer les élèves DÉJÀ affectés pour les classes sélectionnées
        $elevesAffectes = collect();
        if ($classes->isNotEmpty()) {
            $classeIds = $classes->pluck('id_classe');
            
            $elevesAffectes = AffectationsParClasse::where('id_annee', $anneeActive->id_annee)
                ->whereIn('id_classe', $classeIds)
                ->with(['eleve', 'classe'])
                ->get()
                ->groupBy('id_classe');
        }

        return view('affectations.index', compact(
            'anneeActive',
            'classes',
            'elevesNonAffectes',
            'elevesAffectes',
            'niveaux',
            'niveauSelectionne',
            'nomsClasses',
            'nomClasseSelectionne'
        ));
    }

    public function affecter(Request $request)
    {
        $request->validate([
            'id_eleve' => 'required|exists:eleves,id_eleve',
            'id_classe' => 'required|exists:classes,id_classe'
        ]);

        $anneeActive = AnneeScolaire::where('active', 1)->first();

        if (!$anneeActive) {
            return response()->json(['success' => false, 'message' => 'Aucune année active.'], 400);
        }

        // Vérifier si l'élève n'est pas déjà affecté pour cette année
        $existant = AffectationsParClasse::where('id_eleve', $request->id_eleve)
            ->where('id_annee', $anneeActive->id_annee)
            ->first();

        if ($existant) {
            return response()->json([
                'success' => false,
                'message' => 'Cet élève est déjà affecté à une classe pour cette année.'
            ], 400);
        }

        try{
            // Créer l'affectation
            AffectationsParClasse::create([
                'id_eleve' => $request->id_eleve,
                'id_classe' => $request->id_classe,
                'id_annee' => $anneeActive->id_annee,
                'statut' => 'nouveau'
            ]);

            $eleve = Eleve::find($request->id_eleve);
            $classe = Classe::find($request->id_classe);

            return response()->json([
                'success' => true,
                'message' => "{$eleve->nom} {$eleve->prenom} a été affecté(e) à la classe {$classe->nom_classe}."
            ]);
        }
        catch (\Exception $e) {
            \Log::error('Erreur affectation', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'affectation: ' . $e->getMessage()
            ], 500);
        }
        
    }

    public function retirer($id_eleve, $id_classe)
    {
        $anneeActive = AnneeScolaire::where('active', 1)->first();

        if (!$anneeActive) {
            return response()->json(['success' => false, 'message' => 'Aucune année active.'], 400);
        }

        $affectation = AffectationsParClasse::where('id_eleve', $id_eleve)
            ->where('id_classe', $id_classe)
            ->where('id_annee', $anneeActive->id_annee)
            ->first();

        if ($affectation) {
            $affectation->delete();
            return response()->json(['success' => true, 'message' => 'Affectation retirée avec succès.']);
        }

        return response()->json(['success' => false, 'message' => 'Affectation introuvable.'], 404);
    }
}