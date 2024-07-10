<?php

namespace App\Models;

use App\Models\Fournisseur;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livrer extends Model
{
    use HasFactory;

    protected $table = 'livrer';

    public $timestamps = false;
    
    protected $primaryKey = ['id_medicamment', 'id_fournisseur', 'date_livre'];

    public $incrementing = false;

    protected $keyType = 'array';


    protected $guarded = [];

    public function medicamment()
    {
        return $this->belongsTo(Medicamment::class, 'id_medicamment');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'id_fournisseur');
    }
}
