<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies_repertoire extends Model
{
    public $timestamps = false;
    protected $table = 'movies_repertoire';
    protected $fillable = [
        'movie_id',
        'hall_id',
        'date_from',
        'date_to',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday',
        'sunday',
        'time'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];

    
    public function movie()
    {
    	return $this->belongsTo('App\Movies');
    }
    
    public function hall()
    {
    	return $this->belongsTo('App\Halls');
    }
}
