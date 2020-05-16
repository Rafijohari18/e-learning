<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = [];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }
    
 	public function module(){
    	return $this->hasMany('App\Module');
    }
}
