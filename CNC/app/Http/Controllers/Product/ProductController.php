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
use App\Attributes;
use App\Product_Attributes;

class ProductController extends Controller
{
    public function showProducts(Subcategory_Types $subsubcategory){
    	//Optimize price further
        $products = Subcategory_Types::find($subsubcategory->subcategory_types_id);
        $final = array();
        $i = 0;
        foreach ($products->products as $p) {
            if($p->approved_product_id != null){
                $final[$i] = $p;
                $i++;
            }
            
        }
		//return view('product.products')->with(compact('subsubcategory', 'p', 'prices'));
        return view('product.products')->with(compact('subsubcategory', 'final'));
    }

    public function showProduct($id){
        $product = Product::find($id);
        $finalSub = array();
        $i = 0;
        //Add/Fix approved filter. Might not need it, since approved product is only being shown.
        foreach ($product->subcategory as $p) {
            $finalSub[$i] = $p;
            $i++;
                /*
            if($p->approved_product_id != null){
                $final[$i] = $p;
                $i++;
            }
            */
        }
        $attribute = Product::find($id);
        $finalAtt = array();
        $i = 0;
        foreach ($attribute->attributes as $a){
            $finalAtt[$i] = $a;
            $i++;
        }
        return view('product.product')->with(compact('product', 'finalSub', 'finalAtt'));
    }

    public function showAllProducts(){
        $p = Product::all()->where('approved_product_id', '<>', null);
        return view('product.allProducts')->with(compact('p'));
        /*
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
            /*
            return view('product.products')->with(compact('p'));
        }
        else if(Auth::check() && Auth::user()->role_id >= 2){
            return view('product.products')->with(compact('p'));
        }*/
    }

    public function showAdminProductsView(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $product = Product::all();
            return view('product.index')->with(compact('product'));
        }
    }

    public function showCreateProduct(){
        $subcategory = Subcategory_Types::all();
        //$attributes = Attributes::all()->unique('attribute_name');
        $attributes = Attributes::all();
        return view('product.addProduct')->with(compact('subcategory', 'attributes'));
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
        $psub->subcategory_types_id = request('subcategories');
        $psub->save();

        $pa = new Product_Attributes;
        $pa->product_id = $product->product_id;
        $pa->attribute_id = request('attributes');
        $pa->save();

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
            $approved->approved_by = Auth::user()->role_id;

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
