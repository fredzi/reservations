<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    public $timestamps = false;
	protected $table = 'repertoire';
    protected $fillable = [
        'hall_id',
        'movie_id',
        'time'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
    public function reservation(){
        $this->hasMany('App\Reservation','repertoire_id');
    }
}
