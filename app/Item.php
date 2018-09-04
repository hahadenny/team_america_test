<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $table = 'tblitem';

    protected $fillable = ['resnum', 'itemid', 'pcode', 'depdate', 'description', 'qty', 'occupancy', 'price', 'status', 'vendorid', 'nights', 'supplierref', 'datetimecreated', 'datetimemodified'];

    protected $primaryKey = 'itemid';
}
