<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuxRecruiter extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name' ,
        'lastname' ,

        'email' ,
        'company' ,

        'first_interview' ,
        'last_interview' ,

        'remote' ,

        'barcelona' ,
        'madrid' ,
        'asturias' ,
        'sevilla' ,
        'malaga' ,
        'cantabria' ,
        'galicia' ,
        'castilla_y_leon' ,

        'php' ,
        'java' ,

        'idioma', 
        'gender' 

        
    ];
}
