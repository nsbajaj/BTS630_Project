<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'order'; //Custom Table Name
	protected $primaryKey = 'order_id';
}
