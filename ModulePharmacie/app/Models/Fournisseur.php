<?php

namespace App\Models;

use App\Models\Commander;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = 'id_fournisseur';
    
    protected $table = 'fournisseur';
    
    public $timestamps = false;

    public function medicamments()
    {
        return $this->belongsToMany(Medicamment::class, 'livrer', 'id_fournisseur', 'id_medicamment')
                    ->using(Livrer::class);
    }
}
