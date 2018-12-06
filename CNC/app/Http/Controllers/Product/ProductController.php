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
use App\Product_Subcategory_Types;

class ProductController extends Controller
{
    public function showProducts(Subcategory_Types $subsubcategory){
    	//Optimize price further
        //$products = Product::find($subsubcategory->subcategory_types_id);
        
        //$products = Subcategory_Types::find($subsubcategory->subcategory_types_id);
        $products = Subcategory_Types::find($subsubcategory->subcategory_types_id);
        $final = array();
        $i = 0;
        foreach ($products->products as $p) {
            if($p->approved_product_id != null){
                $final[$i] = $p;
                $i++;
            }
        }

            

        /*
        
        */
        /*
        $prices = array();
		$i = 0;
		foreach ($p as $q) {
            $prices[$i] = Price::find($q->price_id);
    		$i++;
		}
        */
		//return view('product.products')->with(compact('subsubcategory', 'p', 'prices'));
        return view('product.products')->with(compact('subsubcategory', 'final'));
    }

    public function showProduct($id){
        $product = Product::find($id);
        return view('product.product')->with(compact('product'));
    }

    public function showAllProducts(){
        $p = Product::all()->where('approved_product_id', '<>', null);
        if(Auth::check() && Auth::user()->role_id == 1){
            //$p = Product::all();
            /*
            $prices = array();
            $i = 0;
            foreach ($product as $q) {
                $prices[$i] = Price::find($q->price_id);
                $i++;
            }
            */
            //return view('product.index')->with(compact('product', 'prices'));
            //return view('product.index')->with(compact('product'));
            return view('product.products')->with(compact('p'));
        }
        else if(Auth::check() && Auth::user()->role_id >= 2){
            return view('product.products')->with(compact('p'));
        }
    }

    public function showAdminProductsView(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $product = Product::all();
            return view('product.index')->with(compact('product'));
        }
    }

    public function showCreateProduct(){
        $subcategory = Subcategory_Types::all();
        return view('product.addProduct')->with(compact('subcategory'));
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
        //$product->price_id = '1';

        $product->save();
        
        //Create a temp table for approvals and disapproval
        $psub = new Product_Subcategory_Types;
        $psub->product_id = $product->product_id;
        $psub->subcategory_types = request('subcategories');
        $psub->save();

        if(Auth::check() && Auth::user()->role_id == 1){
            $products = Product::all();
            /*
            $prices = array();
            $i = 0;
            foreach ($products as $q) {
                $prices[$i] = Price::find($q->price_id);
                $i++;
            }
            */
            //return redirect('/products')->with(compact('products', 'prices'));
            return redirect('/products')->with(compact('products'));
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
