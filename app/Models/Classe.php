<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $primaryKey = 'id_classe';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // si ta table n'a pas created_at / updated_at

    protected $fillable = [
        'nom_classe',
        'niveau'
    ];
}
