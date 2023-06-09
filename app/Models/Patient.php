<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patient';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom_patient',
        'prenom_patient',
        'email',
        'telephone',
        'adresse',
        'password',
        'status',
        'rendezvous_id'
    ];
    public function myAppointment()
    {
        return $this->hasMany('App\Models\Rendezvous','id','rendezvous_id');
    }
}
