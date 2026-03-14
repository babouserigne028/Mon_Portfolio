<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technologie;
use App\Models\DomaineCompetence;
use Illuminate\Http\Request;

class AdminTechnologieController extends Controller
{
    public function index()
    {
        $technologies = Technologie::with('domaines')->get();
        $domaines     = DomaineCompetence::all();
        return view('admin.technologies.index', compact('technologies', 'domaines'));
    }

    public function create()
    {
        $domaines = DomaineCompetence::all();
        return view('admin.technologies.create', compact('domaines'));
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|max:100']);

        $tech = Technologie::create($request->only('nom', 'description'));
        
        if ($request->has('domaines')) {
            $tech->domaines()->sync($request->domaines);
        }

        return redirect()->route('admin.technologies.index')->with('success', 'Technologie ajoutée !');
    }

    public function update(Request $request, Technologie $technologie)
    {
        $request->validate(['nom' => 'required|max:100']);
        $technologie->update($request->only('nom', 'description'));
        $technologie->domaines()->sync($request->domaines);

        return redirect()->route('admin.technologies.index')->with('success', 'Technologie mise à jour !');
    }

    public function destroy($id)
    {
        $technologie = Technologie::findOrFail($id);
        $technologie->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technologie supprimée.');
    }
}