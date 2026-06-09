<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecolage extends Model
{
    use HasFactory;

    protected $table = 'ecolages';

    protected $primaryKey = 'id_ecolage';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false;

    protected $fillable = [
        'mois',
        'montant_ecolage',
        'date_paiement',
        'statut',
        'id_eleve',
        'id_annee'
    ];

    // Relation eleve-ecolage
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, 'id_eleve', 'id_eleve');
    }

    // Relation anneeScolaire-ecolage
    public function annee()
    {
        return $this->belongsTo(AnneeScolaire::class, 'id_annee', 'id_annee');
    }
}
