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
    public function movies_price(){
        return $this->hasOne('App\Movies_price');
    }
    
    
}
