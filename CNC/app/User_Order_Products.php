<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Order_Products extends Model
{
    use SoftDeletes;
    protected $table = 'user_order_products'; //Custom Table Name

    public function products($id){
        return Product::where('product_id', $id)->get();
    }
}
