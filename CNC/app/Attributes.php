<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    protected $table = 'attributes'; //Custom Table Name
	protected $primaryKey = 'attribute_id';
}
