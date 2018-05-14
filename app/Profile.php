<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['settlement', 'about_me'];
    
    public function user()
    {
        return $this->belongsTo('App\User'); 
    }
}
