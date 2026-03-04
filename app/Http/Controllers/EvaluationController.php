<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Matiere;

class EvaluationController extends Controller
{
    // listage - READ
    public function index()
    {
        $evaluations = Evaluation::with('matiere')->get();
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

        Evaluation::create($request->all());

        return redirect()->route('evaluations.index')
            ->with('success', 'Ajout effectué.');
    }

    // afficher une ressource spécifiée
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
