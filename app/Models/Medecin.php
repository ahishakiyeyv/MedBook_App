<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;
    protected $table = 'medecin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom_med',
        'prenom_med',
        'email',
        'telephone',
        'sexe',
        'specialite',
        'disponibilite'
    ];
    public function myPatient()
    {
        return $this->hasMany('App\Models\Patient','id','patient_id');
    }
}
