<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\General_Category;
use App\Subcategory;
use App\Subcategory_Types;

class CategoryController extends Controller
{
    public function showCategory(){
    	$categories = General_Category::all();
    	return view('category.category')->with('categories', $categories);
    }

    public function showSubcategory(General_Category $category){
    	$sub = Subcategory::find($category->general_category_id);
		return view('category.subcategory')->with(compact('category', 'sub'));	
    }

    public function showSubSubcategory(Subcategory $subcategory){
    	$sub = Subcategory_Types::find($subcategory->subcategory_id);
		return view('category.subsubcategory')->with(compact('subcategory', 'sub'));	
    }
}
