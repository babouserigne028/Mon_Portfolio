<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Projet extends Model
{
    public $incrementing = false;
    protected $keyType   = 'string';

    protected $fillable = [
        'id', 'nom', 'description', 'image_couverture', 'lien_projet',
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

    public function technologies()
    {
        return $this->belongsToMany(Technologie::class, 'projet_technologie', 'projet_id', 'technologie_id');
    }

}
