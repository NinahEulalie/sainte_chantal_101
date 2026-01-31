<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parascolaire;

class ParascolaireController extends Controller
{
    // listage - READ
    public function index()
    {
        $parascolaires = Parascolaire::all();
        return view('parascolaires.index', compact('parascolaires'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        return view('parascolaires.create');
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'activite_choisie' => 'required|string|max:255',
            'frais_para' => 'required|integer|min:1'
        ]);

        Parascolaire::create($request->all());

        return redirect()->route('parascolaires.index')
            ->with('success', 'Parascolaire ajouté avec succès.');
    }

    // afficher une ressource spécifiée
    public function show($id_para)
    {
        $parascolaire = Parascolaire::find($id_para);
        return view('parascolaires.show', compact('parascolaire'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_para)
    {
        $parascolaire = Parascolaire::find($id_para);
        return view('parascolaires.edit', compact('parascolaire'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_para)
    {
        $request->validate([
            'activite_choisie' => 'required|string|max:255',
            'frais_para' => 'required|integer|min:1'
        ]);

        $parascolaire = Parascolaire::find($id_para);
        $parascolaire->update($request->all());

        return redirect()->route('parascolaires.index')
            ->with('success', 'Parascolaire modifié avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_para)
    {
        $parascolaire = Parascolaire::find($id_para);
        $parascolaire->delete();

        return redirect()->route('parascolaires.index')
            ->with('success', 'Parascolaire supprimé.');
    }
}
