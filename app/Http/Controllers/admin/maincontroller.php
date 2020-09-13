<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Slider;
use App\Admin\Category;
use App\Admin\Product;
use App\Admin\Package;
use Session;
use DB;
use File;

class maincontroller extends Controller
{
    public function slider(){

        if(Session::get('type')==1){
            $slider=Slider::all();
            return view('admin.pages.slider',compact('slider'));
		}else{
			return redirect()->back();
		}	       
    }
public function slider_store(Request $request){

    $image=$request->file('image');
    $name=uniqid().$image->getClientOriginalName();
    $uploadPath='public/image/';
    $image->move($uploadPath,$name);
    $imageUrl=$uploadPath.$name;
    $this->img($request,$imageUrl);		  
    return redirect()->back()->with('add','add');
}
public function img($request,$imageUrl){
    $slider=new Slider();
    $slider->header=$request->heading;
    $slider->title=$request->title;
    $slider->details=$request->details;
    $slider->image=$imageUrl;
    $slider->save();
}
public function slider_edit($id){
    $data=Slider::find($id);
    return $data;
}
public function slider_update(Request $request){
    $registerById = Slider::find($request->id);
		$image=$request->file('image');

		if ($image) {
            File::delete(public_path() . '/image/', $registerById->image);
			$name=uniqid().$image->getClientOriginalName();
			$uploadPath='public/image/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;

		} else {
			$imageUrl = $registerById->image;
		}
		$this->imge($request,$imageUrl);
        return redirect()->back()->with('update','add');
	}
public function imge($request,$imageUrl){
    $slider=Slider::find($request->id);
    $slider->header=$request->heading;
    $slider->title=$request->title;
    $slider->details=$request->details;
    $slider->image=$imageUrl;
    $slider->save();
}


//Category

public function category(){
    $category=Category::all();
    return view('admin.pages.category',compact('category'));
}

public function category_store(Request $request){
   
    $image=$request->file('image');
    $name=uniqid().$image->getClientOriginalName();
    $uploadPath='public/image/';
    $image->move($uploadPath,$name);
    $imageUrl=$uploadPath.$name;
    $this->imgrr($request,$imageUrl);		  
    return redirect()->back()->with('add','add');
}
public function imgrr($request,$imageUrl){
    $category=new Category();
    $category->category=$request->category;
    $category->quota=$request->quota;
    $category->image=$imageUrl;
    $category->save();
}


public function category_edit($id){
    $data=Category::find($id);
    return $data;  

}
public function category_delete($id){
    $data=Category::find($id);
     $data->delete();
     return redirect()->back()->with('delete','add');
}
public function category_update(Request $request){

    $registerById = Category::find($request->id);
    $image=$request->file('image');

    if ($image) {
        File::delete(public_path() . '/image/', $registerById->image);
        $name=uniqid().$image->getClientOriginalName();
        $uploadPath='public/image/';
        $image->move($uploadPath,$name);
        $imageUrl=$uploadPath.$name;

    } else {
        $imageUrl = $registerById->image;
    }
    $this->imgeer($request,$imageUrl);
    return redirect()->back()->with('update','add');
}
public function imgeer($request,$imageUrl){
$category=Category::find($request->id);
$category->category=$request->category;
$category->quota=$request->quota;
$category->image=$imageUrl;
$category->save();

}


//Product

public function product(){
    $category=Category::all();
    $product=Product::all();
    return view('admin.pages.product',compact('category','product'));
}

public function product_store(Request $request){

    $image=$request->file('image');
    $name=uniqid().$image->getClientOriginalName();
    $uploadPath='public/image/';
    $image->move($uploadPath,$name);
    $imageUrl=$uploadPath.$name;
    $this->imges($request,$imageUrl);		  
    return redirect()->back()->with('add','add');
}
public function imges($request,$imageUrl){
    $product=new Product();
    $product->category=$request->category;
    $product->name=$request->name;
    $product->price=$request->price;
    $product->weight=$request->Weight;
    $product->size=$request->size;
    $product->stock=$request->stock;
    $product->details=$request->details;
    $product->image=$imageUrl;
    $product->save();
}
public function product_edit($id){
    $data=Product::find($id);
    return $data;
}
public function product_delete($id){
    $data=Product::find($id);
   $data->delete();
   return redirect()->back()->with('delete','add');

}
public function product_update(Request $request){
    $registerById = Product::find($request->id);
		$image=$request->file('image');

		if ($image) {
            File::delete(public_path() . '/image/', $registerById->image);
			$name=uniqid().$image->getClientOriginalName();
			$uploadPath='public/image/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;

		} else {
			$imageUrl = $registerById->image;
		}
		$this->imgedd($request,$imageUrl);
        return redirect()->back()->with('update','add');
	}
public function imgedd($request,$imageUrl){
    $product=Product::find($request->id);
    $product->category=$request->category;
    $product->name=$request->name;
    $product->price=$request->price;
    $product->weight=$request->Weight;
    $product->size=$request->size;
    $product->stock=$request->stock;
    $product->details=$request->details;
    $product->image=$imageUrl;
    $product->save();
}

//Package Menu

  public function package(){
      $package=Package::all();
         return view('admin.pages.package',compact('package'));
    }
   public function package_store(Request $request){
                $package=new Package();
                $package->name=$request->name;
                $package->price=$request->price;
                $package->weight=$request->weight;
                $package->one=$request->one;
                $package->two=$request->two;
                $package->three=$request->three;
                $package->save();
     return redirect()->back()->with('add','add'); 
   }

   public function package_edit($id){
       $data=Package::find($id);
       return $data;
   }
   public function package_update(Request $request){
    $package=Package::find($request->id);
    $package->name=$request->name;
    $package->price=$request->price;
    $package->weight=$request->weight;
    $package->one=$request->one;
    $package->two=$request->two;
    $package->three=$request->three;
    $package->save();
return redirect()->back()->with('update','add'); 
}

}
