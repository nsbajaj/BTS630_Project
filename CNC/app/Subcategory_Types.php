<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory_Types extends Model
{
    protected $table = 'subcategory_types'; //Custom Table Name
    protected $primaryKey = 'subcategory_types_id';

    public function subsubcategories(){
        return $this->belongsToMany('App\Subcategory_Types', 'subcategory_subcategory_types', 'subcategory_id', 'subcategory_types_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'product_subcategory_types', 'subcategory_types_id', 'product_id');
    }
}
