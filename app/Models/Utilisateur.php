<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Utilisateur extends Authenticatable
{
    public $incrementing = false;
    protected $keyType   = 'string';

    protected $fillable = [
        'id', 'nom', 'prenom', 'email', 'mot_de_passe', 'photo', 'apropos',
        'lien_cv', 'nbre_annee_experience', 'description', 'adresse',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }

    public function getAuthPasswordName()
    {
        return 'mot_de_passe';
    }
}
