<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    use HasFactory;
    protected $table = 'rendezvous';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nom',
        'prenom',
        'age',
        'sexe',
        'numero_ordre',
        'date_arrive',
        'service',
        'remarque'
    ];
}
