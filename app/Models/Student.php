<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // AÑADE ESTA LÍNEA (Si ya existe, asegúrate de que tiene los 3 campos)
    protected $fillable = ['name', 'email', 'phone'];
}
