<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriKupon extends Model
{
    protected $table = 'kategori_kupon';
    protected $guarded = [];

     public function program(){
    	return $this->belongsTo('App\Program');
    }
     public function kupon(){
    	return $this->belongsTo('App\Kupon');
    }
}