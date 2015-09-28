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
        'price'
    ];
    protected $primaryKey = 'id';
    protected $hidden =[];
}
