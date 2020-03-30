<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    //
    public $timestamps = false;
    protected $table ='status';
    protected $primaryKey='id_status';
}
