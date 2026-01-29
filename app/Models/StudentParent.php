<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;

    protected $table = 'studentparents';

    protected $primaryKey = 'id_parent';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // si ta table n'a pas created_at / updated_at

    protected $fillable = [
        'matricule_parent',
        'nom_pere',
        'profession_pere',
        'nom_mere',
        'profession_mere',
        'nom_tuteur',
        'profession_tuteur',
        'telephone',
        'email',
        'adresse_parent',
    ];
}
