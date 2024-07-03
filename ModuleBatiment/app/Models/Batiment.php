<?php

namespace App\Models;

use App\Models\Niveau;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Batiment extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_batiment';

    protected $table = 'batiment';

    protected $guarded = [];

    public $timestamps = false;

    public function niveaux()
    {
        return $this->hasMany(Niveau::class, 'id_batiment');
    }
}
