<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $primaryKey = 'code_module';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'code_module',
        'nom_module',
        'regionale',
        'mh_presentiel',
        'mh_distance',
        'nombre_total',
    ];

    public function groupProfesseurModules()
    {
        return $this->hasMany(GroupProfesseurModule::class, 'module_code', 'code_module');
    }
}
