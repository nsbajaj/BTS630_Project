<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subcategory_Types;
use App\Product;
use App\Price;
use Auth;
use App\User;
use DateTime;
use App\Approved_Product;

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
        if(Auth::check() && Auth::user()->role_id == 1){
            $product = Product::all();
            /*
            $p = array();
            foreach ($product as $q) {
                //dump(User::find($q->user_id)->pluck('first_name'));
            }
            */
            $prices = array();
            $i = 0;
            foreach ($product as $q) {
                $prices[$i] = Price::find($q->price_id);
                $i++;
            }
            return view('product.index')->with(compact('product', 'prices'));
        }
        else if(Auth::check() && Auth::user()->role_id >= 2){
            $product = Product::all()->where('approved_product_id', '<>', null);
            return view('product.products')->with(compact('product'));
        }
    }

    public function showCreateProduct(){
        return view('product.addProduct');
    }

    public function createProduct(){
        $messages = [
            'pname.required' => 'Please enter a product name.',
            'pname.max' => 'Please enter a shorter product name.',

            'description.required' => 'Please enter a description.',
            'description.max' => 'Please enter a shorter product description.',

            'price.required' => 'Please enter a price.',
        ];

        $this->validate(request(), [
            'pname' => 'required|max:25',
            'description' => 'required|max:100',
            'price' => 'required'
        ], $messages);

        //Create and save the user
        $product = new Product;

        $product->name = request('pname');
        $product->description = request('description');
        $product->user_id = Auth::user()->role_id;
/*
        $price = new Price;
        $price = request('price');
        $now = new DateTime();
        $price->price_set_datetime = $now;
        $price->last_updated = $now;
*/
        //$product->price_id = request('price');
        $product->price_id = '1';

        $product->save();

        if(Auth::check() && Auth::user()->role_id == 1){
            $products = Product::all();
            $prices = array();
            $i = 0;
            foreach ($products as $q) {
                $prices[$i] = Price::find($q->price_id);
                $i++;
            }
            return redirect('/products')->with(compact('products', 'prices'));
        }
        else{
            print("Product Submitted for Approval!");
        }
    }

    public function approveProduct($id){
        if(Auth::check() && Auth::user()->role_id == 1){
            $approved = new Approved_Product;
            //$approved->approved_by = Auth::user()->role_id;
            $approved->approved_by = 4;

            $product = Product::find($id);
            $product->approved_product_id = 1;
            $product->save();

            $products = Product::all();
            $prices = array();
            $i = 0;
            foreach ($products as $q) {
                $prices[$i] = Price::find($q->price_id);
                $i++;
            }
            return redirect('/products')->with(compact('products', 'prices'));
        }
    }
}
