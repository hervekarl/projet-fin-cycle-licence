<?php

namespace App\Models;

use App\Models\Employe;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commander extends Model
{
    use HasFactory;

    protected $table = 'commander';

    public $timestamps = false;
    
    protected $primaryKey = ['id_medicamment', 'id_employe', 'date_command'];

    public $incrementing = false;

    protected $keyType = 'array';

    protected $guarded = [];

    public function medicamment()
    {
        return $this->belongsTo(Medicamment::class, 'id_medicamment');
    }

    public function employe()
    {
        return $this->belongsTo(Employe::class, 'id_employe');
    }
}
