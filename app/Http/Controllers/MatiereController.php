<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere;
use App\Models\Classe;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MatiereController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view matieres', only:['index']),
            new Middleware('permission:create matieres', only:['create']),
            new Middleware('permission:show matieres', only:['show']),
            new Middleware('permission:edit matieres', only:['edit']),
            new Middleware('permission:delete matieres', only:['destroy']),
        ];
    }
    // listage - READ
    public function index()
    {
        $matieres = Matiere::with('classe')->get();
        return view('matieres.index', compact('matieres'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        // return view('eleves.create');
        $classes = Classe::orderBy('nom_classe')->get();
        return view('matieres.create', compact('classes'));
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nom_matiere' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1',
            'nom_prof' => 'required|string|max:255',
            'id_classe' => 'required|exists:classes,id_classe',
        ]);

        Matiere::create($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Matiere ajoutée avec succès.');
    }

    // afficher une ressource spécifiée
    public function show($id_matiere)
    {
        $matiere = Matiere::find($id_matiere);
        return view('matieres.show', compact('matiere'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_matiere)
    {
        $matiere = Matiere::find($id_matiere);
        $classes = Classe::all(); 
        return view('matieres.edit', compact('matiere','classes'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_matiere)
    {
        $request->validate([
            'nom_matiere' => 'required|string|max:255',
            'coefficient' => 'required|integer|min:1',
            'nom_prof' => 'required|string|max:255',
            'id_classe' => 'required|exists:classes,id_classe',
        ]);

        $matiere = Matiere::find($id_matiere);
        $matiere->update($request->all());

        return redirect()->route('matieres.index')
            ->with('success', 'Matiere modifiée avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_matiere)
    {
        $matiere = Matiere::find($id_matiere);
        $matiere->delete();

        return redirect()->route('matieres.index')
            ->with('success', 'Matiere supprimée.');
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
