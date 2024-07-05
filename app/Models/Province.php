<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    public function region(){
        return $this->belongsTo(Regions::class);
    }

    public function coder()
    {
        return $this->belongsToMany(Coder::class, 'coders_locations');
    }

    public function recruiter()
    {
        return $this->belongsToMany(Recruiter::class, 'recruiters_locations');
    }
}

