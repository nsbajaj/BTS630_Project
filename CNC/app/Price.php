<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price'; //Custom Table Name
	protected $primaryKey = 'price_id';

	public function price()
    {
        return $this->hasOne('App\Price');
    }
}
