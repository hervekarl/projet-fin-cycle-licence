<?php

namespace App\Models;

use App\Models\Livrer;
use App\Models\Acheter;
use App\Models\Employe;
use App\Models\Patient;
use App\Models\Commander;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Medicamment extends Model
{
    use HasFactory;

    protected $table = 'medicamment';

    protected $primaryKey = 'id_medicamment';

    public $timestamps = false;

    protected $guarded = [];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'acheter', 'id_medicamment', 'id_patient')
                    ->using(Acheter::class);
    }
    
    public function employes()
    {
        return $this->belongsToMany(Employe::class, 'commander', 'id_medicamment', 'id_employe')
                    ->using(Commander::class);
    }
    
    public function fournisseurs()
    {
        return $this->belongsToMany(Fournisseur::class, 'livrer', 'id_medicamment', 'id_fournisseur')
                    ->using(Livrer::class);
    }
}
