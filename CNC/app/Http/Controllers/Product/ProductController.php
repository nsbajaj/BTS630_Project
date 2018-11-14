<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory_Types;
use App\Product;
use App\Price;

class ProductController extends Controller
{
    public function showProducts(Subcategory_Types $subsubcategory){
    	//Optimize price further
        //$products = Product::find($subsubcategory->subcategory_types_id);
        $products = Subcategory_Types::find($subsubcategory->subcategory_types_id);
        $p = array();
        foreach ($products->products as $q) {
            if($q->approved_product_id != null){
                $p[] = $q;
            }
        }
        $prices = array();
		$i = 0;
		foreach ($p as $q) {
            $prices[$i] = Price::find($q->price_id);
    		$i++;
		}
		return view('product.products')->with(compact('subsubcategory', 'p', 'prices'));
    }

    public function showProduct($id){
        $product = Product::find($id);
        return view('product.product')->with(compact('product'));
    }

    public function showAllProducts(){
        $p = Product::all()->where('approved_product_id', '<>', null);
        return view('product.products')->with(compact('p'));
    }
}
