<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ClasseController extends Controller implements HasMiddleware
{
    public static function middleware():array
    {
        return [
            new Middleware('permission:view classes', only:['index']),
            new Middleware('permission:create classes', only:['create']),
            new Middleware('permission:show classes', only:['show']),
            new Middleware('permission:edit classes', only:['edit']),
            new Middleware('permission:delete classes', only:['destroy']),
        ];
    }
    // listage - READ
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    // afficher le formulaire de création(insertion)
    public function create()
    {
        return view('classes.create');
    }

    // insertion - CREATE
    public function store(Request $request)
    {
        $request->validate([
            'nom_classe' => 'required|string|max:255',
            'niveau' => 'required|string'
        ]);

        Classe::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe ajoutée avec succès.');
    }

    // afficher une ressource spécifiée
    public function show($id_classe)
    {
        $classe = Classe::find($id_classe);
        return view('classes.show', compact('classe'));
    }

    // afficher le formulaire pour la modification
    public function edit($id_classe)
    {
        $classe = Classe::find($id_classe);
        return view('classes.edit', compact('classe'));
    }

    // modification - UPDATE
    public function update(Request $request, $id_classe)
    {
        $request->validate([
            'nom_classe' => 'required|string|max:255',
            'niveau' => 'required|string'
        ]);

        $classe = Classe::find($id_classe);
        $classe->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Classe modifiée avec succès.');
    }

    // suppression - DELETE
    public function destroy($id_classe)
    {
        $classe = Classe::find($id_classe);
        $classe->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Classe supprimée.');
    }
}
