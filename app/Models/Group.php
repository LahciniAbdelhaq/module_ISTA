<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $primaryKey = 'code_group';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'code_group',
        'anne_formation',
        'nbr_stagiaires',
        'nom_ilière',
    ];

    public function groupProfesseurModules()
    {
        return $this->hasMany(GroupProfesseurModule::class, 'group_code', 'code_group');
    }
}
