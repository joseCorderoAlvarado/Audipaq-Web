<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doc extends Model
{
    //
    public $timestamps = false;
    protected $table ='doc';
    protected $primaryKey='id_doc';
}
