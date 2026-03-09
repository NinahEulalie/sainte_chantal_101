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

        // Récupérer le niveau sélectionné (par défaut 9ème)
        $niveauSelectionne = $request->get('niveau', '9ème');

        // Récupérer les classes du niveau sélectionné
        $classes = Classe::where('niveau', $niveauSelectionne)
            ->orderBy('nom_classe')
            ->get();

        // Récupérer tous les élèves NON ENCORE affectés pour cette année
        $elevesNonAffectes = Eleve::whereNotExists(function ($query) use ($anneeActive) {
                $query->select('id_eleve')
                    ->from('eleve_classe_annee')
                    ->whereColumn('eleves.id_eleve', 'affectations_par_classes.id_eleve')
                    ->where('affectations_par_classes.id_annee', $anneeActive->id_annee);
            })
            ->with('parent')
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        // Récupérer les élèves DÉJÀ affectés pour cette année et ce niveau
        $elevesAffectes = AffectationsParClasse::where('id_annee', $anneeActive->id_annee)
            ->whereHas('classe', function ($query) use ($niveauSelectionne) {
                $query->where('niveau', $niveauSelectionne);
            })
            ->with(['eleve', 'classe'])
            ->get()
            ->groupBy('id_classe');

        // Liste des niveaux disponibles
        $niveaux = Classe::select('niveau')->distinct()->orderBy('niveau')->pluck('niveau');

        return view('affectations.index', compact(
            'anneeActive',
            'classes',
            'elevesNonAffectes',
            'elevesAffectes',
            'niveaux',
            'niveauSelectionne'
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