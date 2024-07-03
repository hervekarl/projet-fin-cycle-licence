<?php

namespace App\Models;

use App\Models\Niveau;
use App\Models\Posseder;
use App\Models\Equipement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salle extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'salle';

    protected $primaryKey = 'id_salle';

    public $timestamps = false;

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'id_niveau');
    }

    public function equipements()
    {
        return $this->belongsToMany(Equipement::class, 'posseder', 'id_salle', 'id_equipement')
                    ->using(Posseder::class);
    }
}