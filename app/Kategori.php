<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $guarded = [];

    public function Module(){
    	return $this->hasMany('App\Module');
    }

    public function Program(){
    	return $this->hasMany('App\Program');
    }
}
