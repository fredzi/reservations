<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    
	protected $table = 'reservations';
    protected $fillable = [
        'id',
        'repertoire_id',
        'summary',
        'date_start',
        'date_end',
        'customer_first_name',
        'customer_last_name',
        'customer_email',
        'customer_phone',
        'status'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
}
