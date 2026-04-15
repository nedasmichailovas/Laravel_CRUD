<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vartotoja extends Model
{
    use HasFactory;

    protected $table = 'vartotojas';
    protected $fillable = ['vardas', 'pavarde', 'telefonas', 'gim_data'];
}