<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demande extends Model
{
    use HasFactory , SoftDeletes;

    public function stagaire(){
        return $this->belongsTo(Stagiaire::class);
    }
}
