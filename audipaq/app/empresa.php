<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    //
    public $timestamps = false;
    protected $table ='empresa';
    protected $primaryKey='id_empresa';
}
