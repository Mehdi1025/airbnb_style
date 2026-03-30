<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeLocation extends Model
{
    use HasFactory;

    protected $table = 'demande_de_location';

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'biens_list',
        'email',       // ajouté
        'password',    // ajouté
    ];
}
