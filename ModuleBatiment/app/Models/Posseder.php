<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posseder extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $primaryKey = ['id_salle', 'id_equipement', 'date_debut'];
    
    protected $keyType = 'array';
    
    protected $table = 'posseder';
    
    public $incrementing = false;
    
    public $timestamps = false;
}