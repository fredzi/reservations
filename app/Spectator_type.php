<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spectator_type extends Model
{
    public $timestamps = false;
	protected $table = 'spectators_types';
    protected $fillable = [
        'id',
        'name',
        'price',
        'user_id'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
    
    public function spectator(){
    	return $this->hasMany('App\Movies_price');
    }

}
