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
        'matricule',
        'nom_med',
        'prenom_med',
        'email',
        'telephone',
        'sexe',
        'service',
        'password',
        'status'
    ];
    public function myPatient()
    {
        return $this->hasMany('App\Models\Patient','id','patient_id');
    }
}
