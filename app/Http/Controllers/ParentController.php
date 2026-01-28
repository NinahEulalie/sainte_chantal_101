<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentParent;

class ParentController extends Controller
{
    public function index()
    {
        $parents = StudentParent::all();
        return view('parents.index', compact('parents'));
    }

    public function create()
    {
        return view('parents.create');
    }

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

    public function show(StudentParent $studentParent)
    {
        // $parent = StudentParent::findOrFail($id);
        return view('parents.show', compact('studentParent'));
    }

    public function edit($id)
    {
        $parent = StudentParent::findOrFail($id);
        return view('parents.edit', compact('parent'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'telephone' => 'required|string|max:20',
            'adresse_parent' => 'required|string',
        ]);

        $parent = StudentParent::findOrFail($id);
        $parent->update($request->all());

        return redirect()->route('parents.index')
            ->with('success', 'Parent modifié avec succès.');
    }

    public function destroy($id)
    {
        $parent = StudentParent::findOrFail($id);
        $parent->delete();

        return redirect()->route('parents.index')
            ->with('success', 'Parent supprimé.');
    }
}
