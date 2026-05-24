<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    // Proteccion contra Mass Assignment Vulnerability
    protected $fillable = ['name', 'description'];
}
