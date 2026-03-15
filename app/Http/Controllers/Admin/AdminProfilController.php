<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function edit()
    {
        $utilisateur = Utilisateur::find(Auth::id());
        return view('admin.profil.edit', compact('utilisateur'));
    }

    public function update(Request $request)
    {
        $utilisateur = Utilisateur::find(Auth::id());

        $request->validate([
            'prenom'                => 'required|string|max:100',
            'nom'                   => 'required|string|max:100',
            'email'                 => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'apropos'               => 'nullable|string',
            'nbre_annee_experience' => 'nullable|integer',
            'photo'                 => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lien_cv'               => 'nullable|mimes:pdf|max:5000',
            'password'              => 'nullable|string|min:8',
        ]);

        $utilisateur->prenom     = $request->prenom;
        $utilisateur->nom        = $request->nom;
        $utilisateur->email      = $request->input('email');

        if (Schema::hasColumn('utilisateurs', 'apropos')) {
            $utilisateur->apropos = $request->input('apropos');
        }
        if (Schema::hasColumn('utilisateurs', 'nbre_annee_experience')) {
            $utilisateur->nbre_annee_experience = $request->input('nbre_annee_experience');
        }

        if ($request->hasFile('photo')) {
            if ($utilisateur->photo) {
                Storage::disk('public')->delete($utilisateur->photo);
            }
            $utilisateur->photo = $request->file('photo')->store('profil', 'public');
        }

        if ($request->hasFile('lien_cv')) {
            if ($utilisateur->lien_cv) {
                Storage::disk('public')->delete($utilisateur->lien_cv);
            }
            $utilisateur->lien_cv = $request->file('lien_cv')->store('cv', 'public');
        }

        if ($request->filled('password')) {
            $utilisateur->mot_de_passe = Hash::make($request->password);
        }

        $utilisateur->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil mis à jour !');
    }
}
