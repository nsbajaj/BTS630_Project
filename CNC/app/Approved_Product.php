<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approved_Product extends Model
{
    protected $table = 'approved_product'; //Custom Table Name
	protected $primaryKey = 'approved_product_id';
}
