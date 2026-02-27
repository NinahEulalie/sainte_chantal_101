<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $table = 'matieres';

    protected $primaryKey = 'id_matiere';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'nom_matiere',
        'coefficient',
        'nom_prof',
        'id_classe',
    ];

    // Relation classe-matiere
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe', 'id_classe');
    }
}
