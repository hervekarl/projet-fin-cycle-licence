<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occuper extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $primaryKey = ['id_salle', 'id_patient', 'date_debut'];
    
    protected $keyType = 'array';
    
    protected $table = 'occuper';
    
    public $incrementing = false;
    
    public $timestamps = false;
}