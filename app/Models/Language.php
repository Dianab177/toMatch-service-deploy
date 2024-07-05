<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    
    use HasFactory;
    
    protected $fillable = ['name'];
    
    public static $rules = [
        'name' => 'unique:languages'
    ];
    
    use HasFactory;
    public function coder()
    {
        return $this->belongsToMany(Coder::class, 'coders_languages');
    }
    public function recruiter()
    {
        return $this->belongsToMany(Recruiter::class, 'recruiters_languages');
        
    }
    
}
