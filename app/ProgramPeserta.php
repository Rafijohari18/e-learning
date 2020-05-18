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
}
