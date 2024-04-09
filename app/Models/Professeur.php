<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professeur extends Model
{
    protected $primaryKey = 'code_professeur';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'code_professeur',
        'nom_prenom',
    ];

    public function groupProfesseurModules()
    {
        return $this->hasMany(GroupProfesseurModule::class, 'professeur_code', 'code_professeur');
    }
}
