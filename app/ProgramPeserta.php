<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPeserta extends Model
{
    protected $table = 'peserta_program';
    protected $guarded = [];

    public function program(){
    	return $this->belongsTo('App\Program');
    }
     public function user(){
    	return $this->belongsTo('App\User');
    }
     public function hasil()
    {
        return $this->belongsTo('App\Hasil','user_id');
    }
}
