<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manipuler extends Model
{
    use HasFactory;
    
    protected $table = 'manipuler';

    public $timestamps = false;
    
    protected $primaryKey = ['id_user', 'id_module'];

    public $incrementing = false;

    protected $keyType = 'array';

    protected $guarded = [];

}
