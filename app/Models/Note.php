<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id_note';
    
    protected $fillable = [
        'id_eleve',
        'id_evaluation',
        'note'
    ];

    public $timestamps = false;

    // Relation note-eleve
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve', 'id_eleve');
    }

    // Relation note-evaluation
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, 'id_evaluation', 'id_evaluation');
    }
}