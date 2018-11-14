<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Rating extends Model
{
    protected $table = 'product_rating'; //Custom Table Name
	protected $primaryKey = 'product_rating_id';
}
