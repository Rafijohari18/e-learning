<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
    protected $guarded = [];

    public function module(){
    	return $this->belongsTo('App\Module');
    }
}
