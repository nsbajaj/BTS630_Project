<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategory'; //Custom Table Name
    protected $primaryKey = 'subcategory_id';

    public function subcategories()
    {
        return $this->belongsToMany('App\Subcategory', 'general_category_subcategory', 'general_category_id', 'subcategory_id');
    }
}
