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
}
