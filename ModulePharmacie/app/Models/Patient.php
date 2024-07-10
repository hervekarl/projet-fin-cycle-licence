<?php

namespace App\Models;

use App\Models\Acheter;
use App\Models\Medicamment;
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
        return $this->belongsToMany(Medicamment::class, 'acheter', 'id_patient', 'id_medicamment')
                    ->using(Acheter::class);
    }
}
