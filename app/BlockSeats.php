<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlockSeats extends Model
{
	public $timestamps = false;
	protected $table = 'seats_in_halls';
    protected $fillable = [
        'pos_x',
        'pos_y',
        'hall_id',
        'name'
        
    ];
    protected $primaryKey = 'id';
    
}
