<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    //
    public $timestamps = false;
    protected $table ='persona';
    protected $primaryKey='id_persona';
}
