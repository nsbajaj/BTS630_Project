<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General_Category extends Model
{

	protected $table = 'general_category'; //Custom Table Name
	protected $primaryKey = 'general_category_id';
/*
	public function subcategories()
    {
        //return $this->belongsToMany('App\Subcategory');
        //return $this->belongsToMany('App\Subcategory', 'general_category_subcategory');
        //return $this->belongsToMany('App\Subcategory', 'general_category_subcategory', 'general_category_id', 'subcategory_id');
    }
    */
}
