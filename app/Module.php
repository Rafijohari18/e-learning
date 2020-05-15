<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modul';
    protected $guarded = [];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }

    public function program(){
    	return $this->belongsTo('App\Program');
    }
  
    public function user(){
    	return $this->belongsTo('App\User');
    }
  
    public function materi(){
        return $this->hasMany('App\Materi');
    }
}
