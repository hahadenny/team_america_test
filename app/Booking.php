<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;

    protected $table = 'tblbooking';

    protected $fillable = ['resnum', 'agcode', 'bookingdate', 'status', 'invnum', 'clientref', 'username'];

    protected $primaryKey = 'resnum';
}
