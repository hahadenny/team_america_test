<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public $timestamps = false;

    protected $table = 'tblagency';

    protected $fillable = ['agcode', 'agname', 'phone', 'add1', 'add2', 'city', 'state', 'ZIP', 'country', 'email', 'URL', 'active', 'registereddate'];

    protected $primaryKey = 'agcode';
}
