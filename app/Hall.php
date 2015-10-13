<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    
    protected $fillable = [
        'name',
        'seats',
        'position',
        'created_at',
        'updated_at'
    ];
    
    public function cinema()
    {
        return $this->belongTo('App\Cinema');
    }
    
}
