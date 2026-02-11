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
<<<<<<< HEAD
        // 1. On récupère l'utilisateur à modifier (celui qui est connecté)
        $utilisateur = Utilisateur::find(Auth::id());
=======
        $user = User::find(Auth::id());
>>>>>>> a4de82a (Finalisation Admin Kingston : En utilisant Utilisateur)

        $request->validate([
<<<<<<< HEAD
            'first_name'            => 'required|string|max:100',
            'last_name'             => 'required|string|max:100',
            'email'                 => 'required|email|unique:utilisateurs,email,' . $utilisateur->id,
            'apropos'               => 'nullable|string',
            'nbre_annee_experience' => 'nullable|integer',
            'photo'                 => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lien_cv'               => 'nullable|mimes:pdf|max:5000',
            'password'              => 'nullable|string|min:8',
        ]);

        // 3. Mise à jour des champs
        $utilisateur->first_name = $request->first_name;
        $utilisateur->last_name  = $request->last_name;
        $utilisateur->email      = $request->input('email');

        if (Schema::hasColumn('utilisateurs', 'apropos')) {
            $utilisateur->apropos = $request->input('apropos');
        }
        if (Schema::hasColumn('utilisateurs', 'nbre_annee_experience')) {
            $utilisateur->nbre_annee_experience = $request->input('nbre_annee_experience');
=======
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs,email,' . $user->id, 
            'apropos' => 'nullable|string',
            'nbre_annee_experience' => 'nullable|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'lien_cv' => 'nullable|mimes:pdf|max:5000',
            'password' => 'nullable|string|min:8',
        ]);

        $user->prenom = $request->first_name;
        $user->nom = $request->last_name;
        $user->email = $request->email;
        
        if (Schema::hasColumn('utilisateurs', 'apropos')) {
            $user->apropos = $request->apropos;
        }
        if (Schema::hasColumn('utilisateurs', 'nbre_annee_experience')) {
            $user->nbre_annee_experience = $request->nbre_annee_experience;
>>>>>>> a4de82a (Finalisation Admin Kingston : En utilisant Utilisateur)
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
<<<<<<< HEAD

        // Gestion du nouveau mot de passe
        if ($request->filled('password')) {
            $utilisateur->password = Hash::make($request->password);
        }

        // 4. SAUVEGARDE
        if ($utilisateur instanceof Utilisateur) {
            $utilisateur->save();
        }
=======
        
        if ($request->filled('password')) {
            // On enregistre dans "mot_de_passe"
            $user->mot_de_passe = Hash::make($request->password);
        }

        $user->save();
>>>>>>> a4de82a (Finalisation Admin Kingston : En utilisant Utilisateur)

        return redirect()->route('admin.profil.edit')->with('success', 'Profil Kingston mis à jour !');
    }
}
