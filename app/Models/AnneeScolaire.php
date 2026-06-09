<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeScolaire extends Model
{
    use HasFactory;

    protected $table = 'anneescolaires';

    protected $primaryKey = 'id_annee';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = false; // si ta table n'a pas created_at / updated_at

    protected $fillable = [
        'nom_annee',
        'date_debut',
        'date_fin',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean',
        'date_debut' => 'date',
        'date_fin' => 'date'
    ];

    public function elevesClasses()
    {
        return $this->hasMany(AffectationsParClasse::class, 'id_annee', 'id_annee');
    }

    // Méthode helper pour l'année active
    public static function anneeActive()
    {
        return self::where('active', 1)->first();
    }

    // relation ecolage-anneeScolaire
    public function ecolage()
    {
        return $this->hasMany(Ecolage::class, 'id_annee', 'id_annee');
    }

}
