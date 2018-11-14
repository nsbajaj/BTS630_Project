<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discount'; //Custom Table Name
	protected $primaryKey = 'discount_id';
}
