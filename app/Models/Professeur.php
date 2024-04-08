<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    use HasFactory;


    protected $primaryKey = 'code_professeur';
    protected $keyType = 'string';
    public $incrementing = false;


    public function groups(){

        return $this->belongsToMany(Group::class , 'code_professeur');

    }

    public function modules(){

        return $this->hasMany(Module::class , 'code_professeur');
    }
}
