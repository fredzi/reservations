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
        'price',
        'cinema_id'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
}
