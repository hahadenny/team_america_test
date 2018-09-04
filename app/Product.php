<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $table = 'tblproduct';

    protected $fillable = ['pcode', 'description', 'vendorid'];

    protected $primaryKey = 'pcode';
}
