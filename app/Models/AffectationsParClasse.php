<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffectationsParClasse extends Model
{
    protected $table = 'affectations_par_classes';

    public $timestamps = false;
    
    protected $fillable = [
        'id_eleve',
        'id_classe',
        'id_annee',
        'statut'
    ];

    public $incrementing = false;

    // Relations
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve', 'id_eleve');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'id_classe', 'id_classe');
    }

    public function annee()
    {
        return $this->belongsTo(AnneeScolaire::class, 'id_annee', 'id_annee');
    }
}