<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ecolage;
use App\Models\Eleve;
use App\Models\AnneeScolaire;

class EcolageController extends Controller
{
    // listage - READ
    public function index()
    {
        $ecolages = Ecolage::with(['eleve', 'annee'])
            ->orderBy('date_paiement', 'desc')
            ->get();
            
        return view('ecolages.index', compact('ecolages'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        $eleves = Eleve::orderBy('matricule')->get();
        // Récupérer l'année scolaire active
        $anneeActive = AnneeScolaire::where('active', 1)->first();

        return view('ecolages.create', compact('eleves', 'anneeActive'));
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'mois' => 'required|string|max:255',
            'montant_ecolage' => 'required|integer|min:1',
            'date_paiement' => 'required|date',
            'statut' => 'nullable|boolean',
            'id_eleve' => 'required|exists:eleves,id_eleve',
            'id_annee' => $anneeActive->id_annee,
        ]);

        Ecolage::create($request->all());

        return redirect()->route('ecolages.index')
            ->with('success', 'Ecolage enregistré.');
    }

    // afficher une ressource spécifiée
    public function show($id_ecolage)
    {
        $ecolage = Ecolage::find($id_ecolage);
        return view('ecolages.show', compact('ecolage'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_ecolage)
    {
        $ecolage = Ecolage::find($id_ecolage);
        return view('ecolages.edit', compact('ecolage'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_ecolage)
    {
        $request->validate([
            'mois' => 'required|string|max:255',
            'montant_ecolage' => 'required|integer|min:1',
            'date_paiement' => 'required|date',
            'statut' => 'nullable|boolean',
            'id_eleve' => 'required|exists:eleves,id_eleve',
            'id_annee' => $anneeActive->id_annee,
        ]);

        $ecolage = Ecolage::find($id_ecolage);
        $ecolage->update($request->all());

        return redirect()->route('ecolages.index')
            ->with('success', 'Ecolage modifiée.');
    }

    // suppression - DELETE
    public function destroy($id_ecolage)
    {
        $ecolage = Ecolage::find($id_ecolage);
        $ecolage->delete();

        return redirect()->route('ecolages.index')
            ->with('success', 'Ecolage supprimée.');
    }
}
