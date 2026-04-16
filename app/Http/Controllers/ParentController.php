<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentParent;

class ParentController extends Controller
{
    // listage - READ
    public function index()
    {
        $parents = StudentParent::all();
        return view('parents.index', compact('parents'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        return view('parents.create');
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'matricule_parent' => 'required|string',
            'nom_pere' => 'nullable|string|max:255',
            'profession_pere' => 'nullable|string|max:255',
            'nom_mere' => 'nullable|string|max:255',
            'profession_mere' => 'nullable|string|max:255',
            'nom_tuteur' => 'nullable|string|max:255',
            'profession_tuteur' => 'nullable|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'adresse_parent' => 'required|string',
        ]);

        StudentParent::create($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent ajouté avec succès.');
    }

    // afficher une ressource spécifiée
    public function show($id_parent)
    {
        $parent = StudentParent::find($id_parent);
        return view('parents.show', compact('parent'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_parent)
    {
        $parent = StudentParent::find($id_parent);
        return view('parents.edit', compact('parent'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_parent)
    {
        $request->validate([
            'telephone' => 'required|string|max:20',
            'adresse_parent' => 'required|string',
        ]);

        $parent = StudentParent::find($id_parent);
        $parent->update($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent modifié avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_parent)
    {
        $parent = StudentParent::find($id_parent);
        $parent->delete();

        return redirect()->route('parents.index')
            ->with('success', 'Parent supprimé.');
    }
}
