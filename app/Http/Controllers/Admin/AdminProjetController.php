<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use App\Models\Technologie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjetController extends Controller
{
    public function index()
    {
        $projets      = Projet::with('technologies')->get();
        $technologies = Technologie::all();
        return view('admin.projets.index', compact('projets', 'technologies'));
    }

    public function create()
    {
        $technologies = Technologie::all();
        return view('admin.projets.create', compact('technologies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:200',
            'description' => 'required',
            'image_couverture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'lien_projet' => 'nullable|url|max:500',
        ]);

        $projet = new Projet();
        $projet->nom = $request->nom;
        $projet->description = $request->description;
        $projet->lien_projet = $request->lien_projet;

        if ($request->hasFile('image_couverture')) {
            $path = $request->file('image_couverture')->store('projects', 'public');
            $projet->image_couverture = $path;
        }

        $projet->save();

        if ($request->has('technologies')) {
            $projet->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.projets.index')->with('success', 'Projet ajouté !');
    }

    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        $technologies = Technologie::all();
        return view('admin.projets.edit', compact('projet', 'technologies'));
    }

    public function update(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        $request->validate([
            'nom' => 'required|max:200',
            'description' => 'required',
            'image_couverture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'lien_projet' => 'nullable|url|max:500',
        ]);

        $projet->nom = $request->nom;
        $projet->description = $request->description;
        $projet->lien_projet = $request->lien_projet;

        if ($request->hasFile('image_couverture')) {
            if ($projet->image_couverture) {
                Storage::disk('public')->delete($projet->image_couverture);
            }
            $path = $request->file('image_couverture')->store('projects', 'public');
            $projet->image_couverture = $path;
        }

        $projet->save();
        $projet->technologies()->sync($request->technologies);

        return redirect()->route('admin.projets.index')->with('success', 'Projet modifié !');
    }

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);

        if ($projet->image_couverture) {
            Storage::disk('public')->delete($projet->image_couverture);
        }

        $projet->delete();

        return redirect()->route('admin.projets.index')->with('success', 'Projet supprimé !');
    }
}
