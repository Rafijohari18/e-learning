<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';
    protected $guarded = [];

 	public function module(){
    	return $this->hasMany('App\Module');
    }
}
