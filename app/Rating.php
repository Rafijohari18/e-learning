<?php

namespace App;

use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use Rateable;

    protected $table = 'rating';
    protected $guarded = [];
}