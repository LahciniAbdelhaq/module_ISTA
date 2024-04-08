<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;


    protected $primaryKey = 'code_module';
    protected $keyType = 'string';
    public $incrementing = false;

    public function groups(){

        return $this->belongsToMany(Group::class ,'code_module');
    }

    public function professeurs(){

        return $this->belongsToMany(Professeur::class , 'code_module');
    }
}
