<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Matiere;
use App\Models\Eleve;
use App\Models\Note;
use App\Models\AnneeScolaire;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    // listage - READ
    public function index()
{
    $evaluations = Evaluation::with(['matiere.classe'])
        ->orderBy('date_evaluation', 'desc')
        ->get();
        
    return view('evaluations.index', compact('evaluations'));
}

    // afficher le formulaire de création(insertion)
    public function create()
    {
        $matieres = Matiere::join('classes', 'matieres.id_classe', '=', 'classes.id_classe')
                ->select(
                    'matieres.id_matiere',
                    'matieres.nom_matiere',
                    'classes.nom_classe'
                )
                ->orderBy('classes.nom_classe')
                ->orderBy('matieres.nom_matiere')
                ->get();
        return view('evaluations.create', compact('matieres'));
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'type_evaluation' => 'required|string|max:255',
            'date_evaluation' => 'required|date',
            'periode' => 'required|string|max:255',
            'bareme' => 'required|integer|min:1',
            'id_matiere' => 'required|exists:matieres,id_matiere',
        ]);

        $evaluation = Evaluation::create($request->all());

        //Rediriger vers la page de saisie des notes
        return redirect()->route('evaluations.saisie', $evaluation->id_evaluation)
            ->with('success', 'Évaluation créée. Vous pouvez maintenant saisir les notes.');
    }

    // Afficher la page de saisie des notes
    public function saisirNotes($id_evaluation)
    {
        // Récupérer l'évaluation
        $evaluation = Evaluation::with('matiere.classe')->findOrFail($id_evaluation);
        
        // Récupérer l'année scolaire active
        $anneeActive = AnneeScolaire::where('active', 1)->first();
        
        if (!$anneeActive) {
            return redirect()->back()->with('error', 'Aucune année scolaire active.');
        }

        // Récupérer tous les élèves de la classe pour cette année
        $eleves = Eleve::whereHas('classesAnnees', function($query) use ($evaluation, $anneeActive) {
                $query->where('id_classe', $evaluation->matiere->id_classe)
                      ->where('id_annee', $anneeActive->id_annee);
            })
            ->orderBy('nom')
            ->orderBy('prenom')
            ->get();

        // Récupérer les notes déjà saisies (si modification)
        $notesExistantes = Note::where('id_evaluation', $id_evaluation)
            ->pluck('note', 'id_eleve')
            ->toArray();

        return view('evaluations.saisie', compact('evaluation', 'eleves', 'notesExistantes'));
    }

    // Enregistrer toutes les notes
    public function enregistrerNotes(Request $request, $id_evaluation)
    {
        $request->validate([
            'notes' => 'required|array',
            'notes.*' => 'nullable|numeric|min:0',
        ]);

        $evaluation = Evaluation::findOrFail($id_evaluation);

        foreach ($request->notes as $id_eleve => $note) {
            // Ne sauvegarder que si une note a été saisie
            if ($note !== null && $note !== '') {
                Note::updateOrCreate(
                    [
                        'id_eleve' => $id_eleve,
                        'id_evaluation' => $id_evaluation
                    ],
                    [
                        'note' => $note
                    ]
                );
            }
        }

        return redirect()->route('evaluations.index')
            ->with('success', 'Notes enregistrées avec succès.');
    }

    // afficher une evaluation spécifiée
    public function show($id_evaluation)
    {
        $evaluation = Evaluation::find($id_evaluation);
        return view('evaluations.show', compact('evaluation'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_evaluation)
    {
        $evaluation = Evaluation::find($id_evaluation);
        $matieres = Matiere::all(); 
        return view('evaluations.edit', compact('evaluation','matieres'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_evaluation)
    {
        $request->validate([
            'type_evaluation' => 'required|string|max:255',
            'date_evaluation' => 'required|date',
            'periode' => 'required|string|max:255',
            'bareme' => 'required|integer|min:1',
            'id_matiere' => 'required|exists:matieres,id_matiere',
        ]);

        $evaluation = Evaluation::find($id_evaluation);
        $evaluation->update($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Modifié avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_evaluation)
    {
        $evaluation = Evaluation::find($id_evaluation);
        $evaluation->delete();

        return redirect()->route('evaluations.index')
            ->with('success', 'Suppression effectuée.');
    }

    // Recherche
    // public function search(Request $request)
    // {
    //     $query = $request->get('q');

    //     $eleves = Eleve::with('parent')
    //         ->where('nom', 'LIKE', "%{$query}%")
    //         ->orWhere('prenom', 'LIKE', "%{$query}%")
    //         ->orWhere('adresse', 'LIKE', "%{$query}%")
    //         // ->orWhere('matricule', 'LIKE', "%{$query}%")
    //         ->get();

    //     return view('eleves.partials.table_rows', compact('eleves'));
    // }

}
