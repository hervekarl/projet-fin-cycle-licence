<?php

namespace App\Models;

use App\Models\Salle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patient';

    protected $primaryKey = 'id_patient';

    public $timestamps = false;

    protected $guarded = [];

    public function medicamments()
    {
        return $this->belongsToMany(Salle::class, 'acheter', 'id_patient', 'id_salle')
                    ->using(Occuper::class);
    }
}
