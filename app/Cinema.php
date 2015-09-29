<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
	public $timestamps = false;
    protected $table = 'cinemas';
	protected $fillable = [
	'id',
	'name',
	'city',
	'street',
	'postcode',
	'www',
	'user_id'
	];
    public function halls()
    {
        return $this->hasMany('App\Hall');
    }
    public function users()
    {
    	return $this->belongTo('App\User');
    }
    protected $hidden = [];
    protected $primaryKey = 'id';
}
