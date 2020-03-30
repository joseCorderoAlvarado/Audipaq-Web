<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class observaciones extends Model
{
    //
    public $timestamps = false;
    protected $table ='observaciones';
    protected $primaryKey='id_observaciones';
}
