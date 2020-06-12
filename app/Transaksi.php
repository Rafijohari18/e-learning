<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = [];

    public function program()
    {
    	return $this->belongsTo('App\Program');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function hasil()
    {
        return $this->hasMany('App\Hasil','user_id','program_id');
    }

    public function tgl()
    {
        setlocale(LC_ALL, 'id-ID', 'id_ID');
        $tglTransaksi = strftime("%A, %d %B %Y", strtotime($this->created_at)) . "\n";
        
        return $tglTransaksi;
    }
}
