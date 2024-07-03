<?php

namespace App\Models;

use App\Models\Salle;
use App\Models\Posseder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipement extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'equipement';

    protected $primaryKey = 'id_equipement';

    public $timestamps = false;

    public function salles()
    {
        return $this->belongsToMany(Salle::class, 'posseder', 'id_equipement', 'id_salle')
                    ->using(Posseder::class);
    }
}

