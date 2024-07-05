<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    use HasFactory;

    protected $fillable = [

        'event_id' ,
        'company_id' ,
        
        'name' ,
        'lastname' ,

        'email' ,
       
        'first_interview' ,
        'last_interview' ,

        'remote' ,
       
        'gender' 

        
    ];



    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    /* public function province(){
        return $this->belongsTo(province::class);
    } */

    public function language(){
        return $this->belongsToMany(Language::class, 'recruiters_languages');
    }

    public function coder(){
        return $this->belongsToMany(Coder::class, 'matches','coder_id','recruiter_id')
            ->withPivot('num_match', 'afinity', 'interview' );

    }
    
    public function stack(){
        return $this->belongsToMany(Stack::class, 'recruiters_stacks');
    }

    public function location(){
        return $this->belongsToMany(Province::class, 'recruiters_locations');
    }
}
