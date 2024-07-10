<?php

namespace App\Models;

use App\Models\Commander;
use App\Models\Medicamment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employe';

    protected $primaryKey = 'id_employe';

    public $timestamps = false;

    protected $guarded = [];

    public function medicamments()
    {
        return $this->belongsToMany(Medicamment::class, 'commander', 'id_employe', 'id_medicamment')
                    ->using(Commander::class);
    }
}
