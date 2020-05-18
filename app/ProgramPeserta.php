<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPeserta extends Model
{
    protected $table = 'program_peserta';
    protected $guarded = [];

     public function program(){
    	return $this->belongsTo('App\Program');
    }
}
