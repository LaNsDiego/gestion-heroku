<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected  $primaryKey ="Id";
    protected $table = 'usuario';
    public $timestamps = false;
}

?>