<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupProfesseurModule extends Model
{
    use HasFactory;

    protected $table = 'group_professeur_module';

    protected $fillable = [
        'group_code',
        'professeur_code',
        'module_code',
        'nbr_h_semaine',
        'nbr_pre_s_1',
        'nbr_pre_s_2',
        'nbr_dis_s_1',
        'nbr_dis_s_2',

    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_code', 'code_group');
    }

    public function professeur()
    {
        return $this->belongsTo(Professeur::class, 'professeur_code', 'code_professeur');
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_code', 'code_module');
    }
}
