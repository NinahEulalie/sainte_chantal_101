<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parascolaire extends Model
{
    use HasFactory;

    protected $table = 'parascolaires';

    protected $primaryKey = 'id_para';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // si ta table n'a pas created_at / updated_at

    protected $fillable = [
        'activite_choisie',
        'frais_para'
    ];
}
