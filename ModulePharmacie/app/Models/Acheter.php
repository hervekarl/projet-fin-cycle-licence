<?php

namespace App\Models;

use App\Models\Patient;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Acheter extends Model
{
    use HasFactory;

    protected $table = 'acheter';

    public $timestamps = false;
    
    protected $primaryKey = ['id_patient', 'id_medicamment', 'date_achat'];

    public $incrementing = false;

    protected $keyType = 'array';

    protected $guarded = [];

    public function medicamment()
    {
        return $this->belongsTo(Medicamment::class, 'id_medicamment');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'id_patient');
    }
}
