<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $primaryKey = 'code_group';
    protected $keyType = 'string';
    public $incrementing = false;


    public function professeurs(){

        return $this->hasMany(Professeur::class , 'code_group');

    }

    public function modules(){

        return $this->hasMany(Module::class , 'code_group');

    }
}
