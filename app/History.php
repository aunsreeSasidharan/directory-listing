<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class History extends Model
{
    protected $table = 'histories';
    protected $fillable = ['id','action','date'];
}
