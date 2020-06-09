<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    protected $table = 'kupon';
    protected $guarded = [];

    public function KategoriKupon(){
        return $this->hasMany('App\KategoriKupon');
    }
}