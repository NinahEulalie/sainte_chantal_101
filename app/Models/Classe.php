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

    // Relation classe-evaluation
    public function evaluation()
    {
        return $this->hasMany(Evaluation::class, 'id_classe', 'id_classe');
    }

    public function elevesAnnees()
    {
        return $this->hasMany(AffectationsParClasse::class, 'id_classe', 'id_classe');
    }

    // Compter les élèves pour l'année active
    public function effectifActuel()
    {
        $anneeActive = AnneeScolaire::where('active', 1)->first();
        
        if (!$anneeActive) {
            return 0;
        }

        return $this->elevesAnnees()
            ->where('id_annee', $anneeActive->id_annee)
            ->count();
    }

}
