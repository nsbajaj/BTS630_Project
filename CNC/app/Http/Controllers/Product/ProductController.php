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
use App\Product_Photo;
use App\Suspend_Users;
use Carbon\Carbon;
use App\Subcategory_Subcategory_Types;
use App\Subcategory;
use App\General_Category_Subcategory;
use App\General_Category;
use DB;
use App\Orders;
use App\User_Order_Products;

class ProductController extends Controller
{
    public function showProducts(Subcategory_Types $subsubcategory){
    	//Add approved filter
        $products = array();
        $pictures = array();
        $tempProducts = Product_Subcategory_Types::where('subcategory_types_id', $subsubcategory->subcategory_types_id)->distinct()->get();
        $i = 0;
        foreach($tempProducts as $key => $value){
            $products[$i] = Product::where('product_id', $value->product_id)->get();
            $pictures[$i] = Product_Photo::where('product_id', $value->product_id)->take(1)->get();
            $i++;
        }
        return view('product.products')->with(compact('subsubcategory', 'products', 'pictures'));
    }

    public function showAllProducts(){
        //$p = Product::all()->where('approved_product_id', '<>', null); //Approved Query
        $p = Product::all();
        $pictures = array();
        $i = 0;
        foreach ($p as $key => $value) {
            $pictures[$i++] = Product_Photo::where('product_id', $value->product_id)->take(1)->get();
        }
        
        $final = array();
        $j = 0;
        foreach($pictures as $key => $value){
            foreach($value as $n){
                $final[$j++] = $n;
            }
        }
        return view('product.allProducts')->with(compact('p', 'final'));
    }

    public function showProduct($id){
        //Add approved check
        $product = Product::find($id);
        $photos = Product_Photo::where('product_id', $id)->take(5)->get()->pluck('filename');
        //Gets latest updated price
        $price = Price::where('product_id', $id)->orderBy('updated_at', 'desc')->limit(1)->pluck('amount');
        $user = User::where('user_id', $product->user_id)->get();
        $productsFromUser = Product::where('user_id', $product->user_id)->whereNotIn('product_id', array($id))->take(4)->get();
        //$psub = Product_Subcategory_Types::where('product_id', $id)->get()->pluck('subcategory_types_id');
        //$subType = Subcategory_Types::where('subcategory_types_id', $psub)->get()->pluck('name');
        //$subsub = Subcategory_Subcategory_Types::where('subcategory_types_id', $psub)->get()->pluck('subcategory_id');
        //$subsubType = Subcategory::where('subcategory_id', $subsub)->get()->pluck('name');
        //$gen = General_Category_Subcategory::where('subcategory_id', $subsub)->get()->pluck('general_category_id');
        //$genType = General_Category::where('general_category_id', $gen)->get()->pluck('name');
        
        $pAtt = Product_Attributes::where('product_id', $id)->get()->pluck('attribute_id');
        
        $attArray = array();
        $i = 0;
        if(!empty($pAtt)){
            foreach($pAtt as $key => $value){
                $attArray[$i++] = Attributes::where('attribute_id', $value)->get();    
            }
            // if(!empty($attArray)){   
            //     foreach($attArray as $key => $value){
            //         print($value->get('0')->value);
            //     }
            // }
        }
        //return view('product.product')->with(compact('product', 'photos', 'price', 'user', 'productsFromUser', 'subType', 'subsubType', 'genType', 'pAttType', '$pAttType'));


        return view('product.product')->with(compact('product', 'photos', 'price', 'user', 'productsFromUser', 'attArray'));
    }

    public function showAdminProductsView(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $product = Product::all();
            //$product = Product::withTrashed()->get();
            
            /*
            foreach($product as $p){
                $price = $p->price()->latest()->first();
            }
            */
            return view('product.index')->with(compact('product'));
        }
    }

    public function showCreateProduct(){
        $suspend = Suspend_Users::where('user_id', Auth::user()->user_id)->first();
        if(!empty($suspend)){
            if(Carbon::now() < $suspend->suspend_end){
                abort(404);
            }
        }
        if(Auth::check() && (Auth::user()->role_id == 1) || Auth::user()->role_id == 3){
            $subcategory = Subcategory_Types::all();
            $colours = Attributes::where('attribute_name', "Colour")->get();
            $size = Attributes::where('attribute_name', "Size")->get();
            $sim = Attributes::where('attribute_name', "Sim")->get();
            $sellers = User::where('role_id', 3)->get();
            
            return view('product.addProduct')->with(compact('subcategory', 'attributes', 'sellers', 'colours', 'size', 'sim'));
        }
        else{
            abort(404);
        }
    }

    public function createProduct(Request $request){
        $suspend = Suspend_Users::where('user_id', Auth::user()->user_id)->first();
        if(!empty($suspend)){
            if(Carbon::now() < $suspend->suspend_end){
                abort(404);
            }
        }
            if(Auth::check() && (Auth::user()->role_id == 1) || Auth::user()->role_id == 3){
                $messages = [
                    'pname.required' => 'Please enter a product name.',
                    'pname.max' => 'Please enter a shorter product name.',

                    'description.required' => 'Please enter a description.',
                    'description.max' => 'Please enter a shorter product description.',

                    'price.required' => 'Please enter a price.',
                    'quantity.required' => 'Please enter a quantity.'
                ];

                $this->validate(request(), [
                    'pname' => 'required|max:25',
                    'description' => 'required|max:100',
                    'price' => 'required',
                    'quantity' => 'required'
                ], $messages);

                $product = new Product;
                $product->name = request('pname');
                $product->description = request('description');
                $product->user_id = Auth::user()->user_id; 
                if(request('quantity') > 0){
                    $product->quantity = request('quantity');
                }
                else{
                    $product->quantity = 0;   
                }
                $product->save();

                $price = new Price;
                $price->amount = request('price');
                $price->price_start_date = Carbon::now();
                $price->price_end_date = Carbon::now();
                $price->product_id = $product->product_id;
                $price->save();
                
                //Create a temp table for approvals and disapproval                
                $psub = new Product_Subcategory_Types;
                $psub->product_id = $product->product_id;
                $psub->subcategory_types_id = request('subcategories');
                $psub->save();

                $paColours = new Product_Attributes;
                $paColours->product_id = $product->product_id;
                $paColours->attribute_id = request('colours');
                $paColours->save();

                $paSize = new Product_Attributes;
                $paSize->product_id = $product->product_id;
                $paSize->attribute_id = request('size');
                $paSize->save();

                $paSim = new Product_Attributes;
                $paSim->product_id = $product->product_id;
                $paSim->attribute_id = request('sim');
                $paSim->save();

                $paUnlocked = new Product_Attributes;
                $paUnlocked->product_id = $product->product_id;
                if(!empty(request('customCheck1'))){
                    $status = Attributes::where('value', "Yes")->pluck('attribute_id')->toArray();    
                    $paUnlocked->attribute_id = $status[0];    
                }
                else{
                    $status = Attributes::where('value', "No")->pluck('attribute_id')->toArray();
                    $paUnlocked->attribute_id = $status[0];       
                }
                $paUnlocked->save();


                //Product Photo
        /*
                $this->validate($request, [
                    'filename' => 'required',
                    'filename.*' => 'mimes:doc,pdf,docx,zip,png,jpg,jpeg'
                ]);
        */
                if($request->hasfile('filename')){
                    foreach($request->file('filename') as $file){
                        $name=$file->getClientOriginalName();
                        $file->move(public_path().'/files/', $name);  
                        $data[] = $name;  

                        $photo = new Product_Photo();
                        $photo->filename = $name;
                        $photo->product_id = $product->product_id;
                        $photo->user_id = Auth::user()->user_id;
                        $photo->save(); 
                    }
                }
                //No file attached
                else{
                    $photo = new Product_Photo();
                    $photo->filename = "imagenotfound.png";
                    $photo->product_id = $product->product_id;
                    $photo->user_id = Auth::user()->user_id;
                    $photo->save(); 
                }

                if(Auth::check() && Auth::user()->role_id == 1){
                    $products = Product::all();
                    return redirect('/products')->with(compact('products'));
                }
                else{
                    print("Product Submitted for Approval!");
                }
            }
    }

    public function editProduct(Product $product){
        $suspend = Suspend_Users::where('user_id', Auth::user()->user_id)->first();
        if(!empty($suspend)){
            if(Carbon::now() < $suspend->suspend_end){
                abort(404);
            }
        }
        //Admin can edit and the product being edited has to be by the seller.
        if(Auth::check() && (Auth::user()->role_id == 1) || (Auth::user()->user_id == $product->user_id)){
            $subcategory = Subcategory_Types::all();
            
            //$subsubcategory = Product_Subcategory_Types::where('product_id', $product->product_id); --

            $attributes = Attributes::all();
            $sellers = User::where('role_id', 3)->get();
            $price = Price::where('product_id', $product->product_id)->latest()->first();
            $quantityTemp = Product::where('product_id', $product->product_id)->pluck('quantity')->toArray();
            $quantity = $quantityTemp[0];
            
            //old
            //return view('product.editProduct')->with(compact('subcategory', 'attributes', 'sellers', 'product', 'price', 'quantity'));
            return view('product.editProduct')->with(compact('product', 'price', 'quantity'));
        }
        else{
            abort(404);
        }
    }

    public function updateProduct($id){
        $suspend = Suspend_Users::where('user_id', Auth::user()->user_id)->first();
        if(!empty($suspend)){
            if(Carbon::now() < $suspend->suspend_end){
                abort(404);
            }
        }
            $product = Product::where('product_id', $id)->first();
            if(!empty($product)){
                if(Auth::check() && (Auth::user()->role_id == 1) || (Auth::user()->user_id == $product->user_id)){

                    $messages = [
                        'pname.required' => 'Please enter a product name.',
                        'pname.max' => 'Please enter a shorter product name.',

                        'description.required' => 'Please enter a description.',
                        'description.max' => 'Please enter a shorter product description.',

                        'price.required' => 'Please enter a price.',
                    'quantity.required' => 'Please enter a quantity.'
                    ];

                    $this->validate(request(), [
                        'pname' => 'required|max:25',
                        'description' => 'required|max:100',
                        'price' => 'required',
                        'quantity' => 'required'
                    ], $messages);

                    //$product = Product::where('product_id', $id)->first();
                    if(!empty($product)){
                        $product->name = request('pname');
                        $product->description = request('description');
                        
                        //Price
                        $price = Price::where('product_id', $id)->latest()->first();
                        if(!empty($price)){
                            $price->amount = request('price');
                            $price->save();
                        }

                        //Product::find($id)->subcategory()->updateExistingPivot($id, ['subcategory_types_id' => request('subcategories')]);

                        //Attribute
                        //Only one attribute can be updated at the moment
                        //Product::find($id)->attributes()->updateExistingPivot($id, ['attribute_id' => request('attributes')]);

                        
                        $product->user_id = Auth::user()->user_id;
                        if(!empty(request('quantity'))){
                            $product->quantity = request('quantity');
                        }
                        $product->save();

                        if(Auth::check() && Auth::user()->role_id == 1){
                            return redirect('/inventory');
                            //return $this->showAdminProductsView();
                        }
                        else if(Auth::check() && Auth::user()->role_id == 3){
                            return $this->showProduct($id);
                        }
                    }
                }
            }
    }

    public function approveProduct($id){
        if(Auth::check() && Auth::user()->role_id == 1){
            $approved = new Approved_Product;
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

    public function deleteProduct(Product $product){
        $suspend = Suspend_Users::where('user_id', Auth::user()->user_id)->first();
        if(!empty($suspend)){
            if(Carbon::now() < $suspend->suspend_end){
                abort(404);
            }
        }
            if(Auth::check() && Auth::user()->role_id == 1){
                    $product->delete();
                    return $this->showAdminProductsView();
            } 
            else if(Auth::check() && Auth::user()->user_id == $product->user_id){
                $product->delete();
                return $this->showAllProducts();
            }
    }

    //Shows all deleted products
    public function deletedProducts(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $deletedCollection = Product::onlyTrashed()->get();
            return view('product.deletedProducts')->with(compact('deletedCollection'));
        }
        else if(Auth::check() && Auth::user()->role_id == 3){
            $deletedCollection = Product::withTrashed()->where('user_id', Auth::user()->user_id)->get();
            return view('product.deletedProducts')->with(compact('deletedCollection'));
        }
        else{
            abort(404);
        }
        /*
            @foreach ($deletedCollection as $delete => $value)
                                    <p>{{ $value->product_id }}</p>
                                @endforeach
        */
    }
	public function inventory(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $products = Product::all();
            //$p->price()->latest()->pluck('amount')->first(); //For view        
            return view('product.inventory')->with(compact('products'));
        }
        else{
            abort(404);
        }
	}
	public function otp(){
        if(Auth::check() && Auth::user()->role_id == 1){
            $orders = Orders::withTrashed()->get();
            $orderDetails = array();
            $products = array();
            //List of order status
            $orderStatusTypes = array(1 => "Placed", 2 => "Shipped", 3 => "Completed", 4 => "Cancelled"); 
            if(!empty($orders)){
                foreach($orders as $key => $value){
                    // $orderDetails[$key] = User_Order_Products::where('order_id', $value->order_id)->get()->toArray();
                    $orderDetails[$key] = User_Order_Products::where('order_id', $value->order_id)->withTrashed()->get();
                }
                $orderSuccess = true;
                return view('orders.otp')->with(compact('orders', 'orderSuccess', 'orderStatusTypes'));
            }
        }
        else if(Auth::check() && Auth::user()->role_id == 3){
            $orders = Orders::where('user_id', Auth::user()->user_id)->withTrashed()->get();
            $orderDetails = array();
            $products = array();
            if(!empty($orders)){
                foreach($orders as $key => $value){
                    $orderDetails[$key] = User_Order_Products::where('order_id', $value->order_id)->get()->toArray();
                }
                //$orderSuccess = true;
                return view('orders.otp')->with(compact('orders', 'orderSuccess'));
            }
        }      
        else{
            return redirect('/signin');
        }  
    }

    public function orderDetails($id, $orderSuccess = false){
        //Add validation for current order being viewed is users own order.
        if(!empty($id)){
            //List of order status
            $orderStatusTypes = array(1 => "Placed", 2 => "Shipped", 3 => "Completed", 4 => "Cancelled");
            $orderStatus = Orders::where('order_id', $id)->withTrashed()->get()->pluck('order_status_code');
            $orderDetails = User_Order_Products::where('order_id', $id)->withTrashed()->get();
            foreach($orderDetails as $key => $value){
                //$value->name($value->product_id);
            }
            
            if($orderSuccess == true){
                return view('orders.orderDetails')->with(compact('orderDetails', 'orderStatusTypes', 'orderStatus', 'id', 'orderSuccess'));
            }
            else{
                return view('orders.orderDetails')->with(compact('orderDetails', 'orderStatusTypes', 'orderStatus', 'id'));
            }
        }
    }

    public function deleteOrder($id){
        //Add validation for current order being viewed is users own order.
        //Add validation for order status, cannot delete once shipped.
        if(!empty($id)){
            $order = Orders::where('order_id', $id)->first();
            $order->order_status_code = 4;
            $order->deleted_at = Carbon::now();
            $order->save();
        }
        return redirect('/orders');
    }        
	
	public function otf()
    {
        return view('orders.otf');
    }
	public function cart(){
		return view('payment.cart');
	}
	public function billing(){
		 return view('payment.billing');
	}
	public function placed(){
		 return view('payment.placed');
    }
    
    public function search(){
        $search = request('search');
        if(!empty($search)){
            $p = Product::where('name','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->get();
            $pictures = array();
            $i = 0;
            foreach ($p as $key => $value) {
                $pictures[$i++] = Product_Photo::where('product_id', $value->product_id)->take(1)->get();
            }
            
            $final = array();
            $j = 0;
            foreach($pictures as $key => $value){
                foreach($value as $n){
                    $final[$j++] = $n;
                }
            }
            return view('product.allProducts')->with(compact('p', 'final'));
        }
    }

    public function shoppingCart(){
        if(!empty(request('quantity')) && !empty(request('price')) && !empty(request('productName'))){
            $quantity = request('quantity');
            $price = request('price');
            $productName = request('productName');
            $data = array(
                "id" => "3",
                "name" => $productName,
                "quantity" => $quantity,
                "price" => $price
            );            
            $data = json_encode($data);
            return view('product.cart')->with(compact('data'));
        }
        else{
            return view('product.cart');
        }
    }

    //1 - Placed
    //2 - Shipped
    //3 - Completed
    //4 - Cancelled
    public function checkout(){
        if(Auth::check()){ //Logged in
            if(!empty(request('itemlist'))){
                $itemList = request('itemlist');
                $arr = json_decode($itemList);
                
                $order = new Orders;
                $order->user_id = Auth::user()->user_id;
                $order->payment_method = 0; //Needs to be changed later
                
                $order->order_status_code = 1;
                $order->order_placed_date = Carbon::now();
                $order->order_paid_date = Carbon::now();
                $order->total_order_price = 100; //Calculate it later
                $order->save();

                foreach($arr as $key => $value){
                    $orderDetails = new User_Order_Products;
                    $orderDetails->order_id = $order->order_id;
                    $orderDetails->product_id = $value->id;
                    $orderDetails->quantity = $value->quantity;
                    $orderDetails->save();

                    $product = Product::where('product_id', $value->id)->first();
                    $product->quantity = $product->quantity - $value->quantity;
                    $product->save();
                }
                $orderSuccess = true;
                return $this->orderDetails($order->order_id, $orderSuccess);
            }
            //Cart is empty
            else{
                return redirect('/shoppingCart');
            }
        }
        //Redirect to login page
        else{
            return redirect('/signin');
        }
    }

    public function updateShippingStatus($id){
        $order = Orders::where('order_id', $id)->first();
        $order->order_status_code = request('shippingStatusForm');
        $order->save();
        return redirect('/orders');
    }
}
