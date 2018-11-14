<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price;

class Product extends Model
{
    protected $table = 'product'; //Custom Table Name
	protected $primaryKey = 'product_id';

/*
    public function price()
    {
        return $this->hasOne('App\Price');
    }
    */
}
