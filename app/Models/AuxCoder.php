<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxCoder extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile' ,
        'promocion' ,
        'name' ,
        'lastname' ,
        'gender' ,
        'ubicacion' ,
        'idioma' ,
        'php' ,
        'java' ,
        'javascript' ,
        'react' ,
        'ingles_alto' 

        
    ];
}
