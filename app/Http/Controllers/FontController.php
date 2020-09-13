<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Slider;
use App\Admin\Product;
use App\Admin\Category;
use App\Admin\Package;

class FontController extends Controller
{
   public function index(){
      $category=Category::all();
      $product=Product::inRandomOrder()->get();
      $products=Product::all();
      $slider=Slider::all();
      $package=Package::all();
    return view('font.page.home',compact('slider','product','products','category','package'));
   }

   public function index_product($id){
      $category=Category::all();
      $categorys=Category::find($id);
      $product=Product::where('category',$id)->inRandomOrder()->get();
      $products=Product::where('category',$id)->get();
      $package=Package::all();
    return view('font.page.products',compact('product','products','category','categorys','package'));
   }
}
