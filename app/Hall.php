<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    
    protected $fillable = [
        'name'
    ];
    
    public function cinema()
    {
        return $this->belongTo('App\Cinema');
    }
    
}
