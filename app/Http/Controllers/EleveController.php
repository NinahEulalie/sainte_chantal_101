<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eleve;
use App\Models\StudentParent;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class EleveController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view eleves', only:['index']),
            new Middleware('permission:create eleves', only:['create']),
            new Middleware('permission:show eleves', only:['show']),
            new Middleware('permission:edit eleves', only:['edit']),
            new Middleware('permission:delete eleves', only:['destroy']),
        ];
    }
    // listage - READ
    public function index()
    {
        $eleves = Eleve::with('parent')->get();
        return view('eleves.index', compact('eleves'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        // return view('eleves.create');
        $parents = StudentParent::orderBy('nom_pere')->get();
        return view('eleves.create', compact('parents'));
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|string|unique:eleves,matricule',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'date_nais' => 'required|date',
            'lieu_nais' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'genre' => 'required|string',
            'annee_scolaire_entree' => 'required|string|max:255',
            'id_parent' => 'required|exists:studentparents,id_parent',
        ]);

        Eleve::create($request->all());

        return redirect()->route('eleves.index')
            ->with('success', 'Eleve ajouté avec succès.');
    }

    // afficher une ressource spécifiée
    public function show($id_eleve)
    {
        $eleve = Eleve::find($id_eleve);
        return view('eleves.show', compact('eleve'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_eleve)
    {
        $eleve = Eleve::find($id_eleve);
        $parents = StudentParent::all(); 
        return view('eleves.edit', compact('eleve','parents'));
    }

    public function update(Request $request, $id_eleve)
    {   
        $eleve = Eleve::findOrFail($id_eleve);
        $validator = validator([
            'matricule' => 'required|string|unique:eleves,matricule',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string',
            'date_nais' => 'required|date',
            'lieu_nais' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'genre' => 'required|string',
            'annee_scolaire_entree' => 'required|string|max:255',
            'id_parent' => 'required|exists:parents,id_parent',
        ]);
        $eleve->update($request->all());

        return redirect()->route('eleves.index')
            ->with('success', 'Eleve modifié avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_eleve)
    {
        $eleve = Eleve::find($id_eleve);
        $eleve->delete();

        return redirect()->route('eleves.index')
            ->with('success', 'Eleve supprimé.');
    }

    // Recherche
    public function search(Request $request)
    {
        $query = $request->get('q');

        $eleves = Eleve::with('parent')
            ->where('nom', 'LIKE', "%{$query}%")
            ->orWhere('prenom', 'LIKE', "%{$query}%")
            ->orWhere('adresse', 'LIKE', "%{$query}%")
            // ->orWhere('matricule', 'LIKE', "%{$query}%")
            ->get();

        return view('eleves.partials.table_rows', compact('eleves'));
    }

}
