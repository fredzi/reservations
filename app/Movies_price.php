<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_price extends Model
{
    public $timestamps = false;
    protected $table = 'movies_prices';
    protected $fillable = [
        'movie_id',
        'spectator_type_id',
        'price'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];

    
    public function movie()
    {
    	return $this->belongsTo('App\Movies');
    }
    
    public function spectator()
    {
    	return $this->belongsTo('App\Spectator_type');
    }
}
