<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';
    protected $guarded = [];

     public function user(){
    	return $this->belongsTo('App\User');
    }

     public function program(){
    	return $this->belongsTo('App\Program');
    }
     public function ProgramPeserta()
    {
        return $this->hasOne('App\ProgramPeserta','user_id');
    }

    public function transaksi(){
        return $this->belongsTo('App\Transaksi','user_id','program_id');
    }
}