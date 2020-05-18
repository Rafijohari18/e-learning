<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPeserta extends Model
{
    protected $table = 'program_peserta';
    protected $guarded = [];

	// Relasi
	// public function peserta()
	// {
	//  	return $this->belongsToMany(Peserta::class);
	// } 
}
