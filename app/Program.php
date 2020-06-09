<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use Rateable;
    
    protected $table = 'program';
    protected $guarded = [];

    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }
    
 	public function module(){
    	return $this->hasMany('App\Module');
    }
    
    public function ProgramPeserta(){
    	return $this->hasMany('App\ProgramPeserta');
    }

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }
    public function hasil(){
        return $this->hasMany('App\Hasil');
    }
     public function KategoriKupon(){
        return $this->hasMany('App\KategoriKupon');
    }

    public function rating($id)
    {
        $rate = Program::where('id', $id)->first();
        $jml = $rate->averageRating();
        
        return $jml;
    }
}
