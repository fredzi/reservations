<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spectator_type extends Model
{
    public $timestamps = false;
	protected $table = 'spectators_types';
    protected $fillable = [
        
        'name',
        'price',
        'cinema_id'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
}
