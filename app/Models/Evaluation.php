<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table = 'evaluations';

    protected $primaryKey = 'id_evaluation';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'type_evaluation',
        'date_evaluation',
        'periode',
        'matiere',
        'bareme',
        'professeur',
        'id_classe',
    ];

    // Relation classe-evaluation
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe', 'id_classe');
    }

    // Relation note-evaluation
    public function notes()
    {
        return $this->hasMany(Note::class, 'id_evaluation', 'id_evaluation');
    }
}
