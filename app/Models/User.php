<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. UTILISER LA TABLE DU COLLÈGUE
    protected $table = 'utilisateurs';

    // 2. CONFIGURATION UUID
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    // 3. ADAPTATION DES CHAMPS (on utilise ses noms de colonnes)
    protected $fillable = [
        'id', 'nom', 'prenom', 'email', 'mot_de_passe', 'photo', 'apropos', 'lien_cv', 'nbre_annee_experience'
    ];

    protected $hidden = [
        'mot_de_passe', 'remember_token',
    ];

    // 4. DIRE À LARAVEL OÙ EST LE MOT DE PASSE
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    // 5. RELATION AVEC SES COMPÉTENCES (Table utilisateur_technologie)
    public function technologies()
    {
        return $this->belongsToMany(Technologie::class, 'utilisateur_technologie', 'utilisateur_id', 'technologie_id')
                    ->withPivot('niveau_maitrise');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) $model->id = (string) Str::uuid();
        });
    }
}