<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnneeScolaire;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AnneeController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view anneescolaires', only:['index']),
            new Middleware('permission:create anneescolaires', only:['create']),
            new Middleware('permission:show anneescolaires', only:['show']),
            new Middleware('permission:edit anneescolaires', only:['edit']),
            new Middleware('permission:delete anneescolaires', only:['destroy']),
        ];
    }
    // listage - READ
    public function index()
    {
        $annees = AnneeScolaire::orderBy('date_debut', 'desc')->get();
        return view('anneescolaires.index', compact('annees'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        return view('anneescolaires.create');
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nom_annee' => 'required|string|max:255',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after:date_debut',
            'active'      => 'nullable|boolean',
        ]);

        // si une année est active => désactiver les autres
        if ($request->active) {
            AnneeScolaire::where('active', true)->update(['active' => false]);
        }

        AnneeScolaire::create([
            'nom_annee'  => $request->nom_annee,
            'date_debut' => $request->date_debut,
            'date_fin'   => $request->date_fin,
            'active'     => $request->has('active') ? true : false,
        ]);

        return redirect()->route('anneescolaires.index')
            ->with('success', 'Année scolaire ajoutée.');
    }

    // afficher une ressource spécifiée
    public function show($id_annee)
    {
        $annee = AnneeScolaire::find($id_annee);
        return view('anneescolaires.show', compact('annee'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_annee)
    {
        $annee = AnneeScolaire::find($id_annee);
        return view('anneescolaires.edit', compact('annee'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_annee)
    {
        $request->validate([
            'nom_annee'   => 'required|string|max:255',
            'date_debut'  => 'required|date',
            'date_fin'    => 'required|date|after:date_debut',
            'active'      => 'nullable|boolean',
        ]);

        $annee = AnneeScolaire::find($id_annee);

        if ($request->active) {
            AnneeScolaire::where('active', true)->update(['active' => false]);
        }

        $annee->update([
            'nom_annee'  => $request->nom_annee,
            'date_debut' => $request->date_debut,
            'date_fin'   => $request->date_fin,
            'active'     => $request->has('active') ? true : false,
        ]);

        return redirect()->route('anneescolaires.index')
            ->with('success', 'Année scolaire modifiée avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_annee)
    {
        $annee = AnneeScolaire::find($id_annee);
        $annee->delete();

        return redirect()->route('anneescolaires.index')
            ->with('success', 'Année scolaire supprimée.');
    }
}
