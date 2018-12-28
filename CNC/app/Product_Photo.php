<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Photo extends Model
{
    protected $table = 'product_photo'; //Custom Table Name
	protected $primaryKey = 'product_photo_id';
}
