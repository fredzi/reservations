<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $timestamps = false;
    protected $table = 'movies';
    protected $fillable = [
        'title',
        'original_title',
        'time',
        'describtion',
        'user_id'
    ];
    
    protected $primaryKey = 'id';
    protected $hidden =[];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
    
    public function prices(){
        return $this->hasMany('App\Movies_price', 'movie_id');
    }
    
    public function repertoire(){
        return $this->hasMany('App\Movies_repertoire', 'movie_id');
    }
    
}
