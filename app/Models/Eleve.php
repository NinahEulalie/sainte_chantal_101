<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;

    protected $table = 'eleves';

    protected $primaryKey = 'id_eleve';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // si ta table n'a pas created_at / updated_at

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'date_nais',
        'lieu_nais',
        'adresse',
        'genre',
        'annee_scolaire_entree',
        'id_parent',
    ];

    // Relation parent-eleve
    public function parent()
    {
        return $this->belongsTo(StudentParent::class, 'id_parent', 'id_parent');
    }
}
