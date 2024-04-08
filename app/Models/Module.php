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

    protected $fillable = ['code_module' , 'nom_module', 'regionale' ,'mh_presentiel' , 'mh_distance' , 'nombre_total'];

    public function groups(){

        return $this->belongsToMany(Group::class ,'code_module');
    }

    public function professeurs(){

        return $this->belongsToMany(Professeur::class , 'code_module');
    }
}
