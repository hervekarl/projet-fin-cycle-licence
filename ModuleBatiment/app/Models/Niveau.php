<?php

namespace App\Models;

use App\Models\Salle;
use App\Models\Batiment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_niveau';

    protected $table = 'niveau';
    
    protected $guarded = [];

    public $timestamps = false;

    public function batiment()
    {
        return $this->belongsTo(Batiment::class, 'id_batiment');
    }

    public function salles()
    {
        return $this->hasMany(Salle::class, 'id_niveau');
    }
}