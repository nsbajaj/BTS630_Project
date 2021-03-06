<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Price;
use App\Subcategory_Types;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'product'; //Custom Table Name
	protected $primaryKey = 'product_id';

	public function user()
    {
        return $this->hasOne('App\User');
    }

    public function attributes(){
        return $this->belongsToMany('App\Attributes', 'product_attributes', 'product_id', 'attribute_id');
    }

    public function subcategory(){
        return $this->belongsToMany('App\Subcategory_Types', 'product_subcategory_types', 'product_id', 'subcategory_types_id');
    }

    public function price(){
        return $this->hasMany('App\Price', 'product_id');
    }

    public function pictures(){
        return $this->hasMany('App\Product_Photo', 'product_id');
    }

    public function getPrice($id){
        return Price::where('product_id', $id)->orderBy('updated_at', 'desc')->limit(1)->pluck('amount');        
    }
}
