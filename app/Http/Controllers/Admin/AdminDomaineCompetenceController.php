<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DomaineCompetence;
use Illuminate\Http\Request;

class AdminDomaineCompetenceController extends Controller
{
    public function index()
    {
        $domaines = DomaineCompetence::all();
        return view('admin.domaines.index', compact('domaines'));
    }

    public function create()
    {
        return view('admin.domaines.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'icone'       => 'nullable|string|max:100',
            'couleur'     => 'nullable|string|max:7',
        ]);
        DomaineCompetence::create($request->only('nom', 'description', 'icone', 'couleur'));
        return redirect()->route('admin.domaines.index')->with('success', 'Domaine de compétence ajouté !');
    }

    public function show(DomaineCompetence $domaine)
    {
        return view('admin.domaines.show', compact('domaine'));
    }

    public function edit(DomaineCompetence $domaine)
    {
        return view('admin.domaines.edit', compact('domaine'));
    }

    public function update(Request $request, DomaineCompetence $domaine)
    {
        $request->validate([
            'nom'         => 'required|string|max:255',
            'description' => 'nullable|string',
            'icone'       => 'nullable|string|max:100',
            'couleur'     => 'nullable|string|max:7',
        ]);
        $domaine->update($request->only('nom', 'description', 'icone', 'couleur'));
        return redirect()->route('admin.domaines.index')->with('success', 'Domaine de compétence modifié !');
    }

    public function destroy(DomaineCompetence $domaine)
    {
        $domaine->delete();
        return redirect()->route('admin.domaines.index')->with('success', 'Domaine de compétence supprimé !');
    }
}
