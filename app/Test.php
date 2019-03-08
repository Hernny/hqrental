<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
	protected $fillable = [
        'lat', 'lng',
    ];
	protected $table = 'tests';
}
