<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infirmier extends Model
{
    use HasFactory;
    protected $table = 'infirmier';
    protected $primaryKey = 'id';
    protected $fillable = [
        'matricule',
        'nom_inf',
        'prenom_inf',
        'email',
        'telephone',
        'password',
        'status',
        'rendezvous_id'
    ];
    public function myAppointment()
    {
        return $this->hasMany('App\Models\Rendezvous','id','rendezvous_id');
    }
}
