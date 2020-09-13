<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Customer;
use App\AdminOrder;
use App\AdminOrderdetails;
use App\AdminPayment;
use App\AdminShipping;
use Hash;
use App\Admin\Package;
use Cart;
use Session;
use DB;

// ->select('order_details.product_id','order_details.productname','order_details.capacity',DB::raw('SUM(qty) as total_qty'),
//  DB::raw('SUM(total) as total_sale'))
//                     ->groupBy('product_id','productname','capacity')
//                     ->orderBy('total_qty', 'DESC')
//                     ->get();

class OrderController extends Controller
{
    public function customer_order(){

        if(Session::get('type')==2){
        $count=DB::table('admin_orders')
                  ->select(DB::raw('SUM(total) as totalcost'),DB::raw('SUM(totalkg) as kg'))
                  ->where('customer',session::get('ID'))
                  ->COUNT();
          
    $result=DB::table('admin_orders')
                  ->select(DB::raw('SUM(total) as cost'),DB::raw('SUM(totalkg) as kg'))
                  ->where('customer',session::get('ID'))
                  ->first();
                  //dd($result);

            $order=AdminOrder::where('customer',session::get('ID'))->get();            
        return view('font.page.order',compact('count','result','order'));
        }else{
            return redirect()->back();
        }
    }
    public function cart(){

        if(Cart::getTotalQuantity()==0){
            return redirect('/'); 
        }else{
            $cartProduct=Cart::getContent();
            //dd($cartProduct);
            return view('font.page.cart',compact('cartProduct'));
        }
       
    }
      
    public function shipping(){
        if(Session::get('type')==2 && Cart::getTotalQuantity()!=0){          
            return view('font.page.shipping');
		}else{
			return redirect('/loged');
		}		
       
    }

  public function shipping_store(Request $request){

    $digit=strlen($request->phone);

    if($digit==11){
        if(substr($request->phone, 0, 3)== "013" or substr($request->phone, 0, 3)
        == "014" or substr($request->phone, 0, 3)== "015" or substr($request->phone, 0, 3)
        == "016" or substr($request->phone, 0, 3)== "017"or substr($request->phone, 0, 3)
        == "018" or substr($request->phone, 0, 3)== "019"){
            $ship=new AdminShipping();
            $ship->name=$request->name;
            $ship->email=$request->email;
            $ship->phone=$request->phone;
            $ship->division=$request->division;
            $ship->district=$request->district;
            $ship->courier=$request->courier;
            $ship->address=$request->address;
            $ship->save();
            Session::put('shippingId',$ship->id);
            return redirect('/payment');
        }else{
            return redirect()->back()->with('mobi','ddd');
        }
    }else{
        return redirect()->back()->with('mobi','ddd');
    }

  }



    public function payment(){
        if(Session::get('shippingId')==null){
            return redirect()->back();
        }else{
            return view('font.page.payment');
        }
        
    }

    public function payment_store(Request $request){
     


        $digit=strlen($request->number);
            if($digit==11 or $digit==12 or $digit==0){
              if(substr($request->number, 0, 3)== "013" or substr($request->number, 0, 3)
              == "014" or substr($request->number, 0, 3)== "015" or substr($request->number, 0, 3)
              == "016" or substr($request->number, 0, 3)== "017"or substr($request->number, 0, 3)
              == "018" or substr($request->number, 0, 3)== "019" or $digit==0 ){
                 
           
                $ints=mt_rand(00000,99999); 
                 
                $order=new AdminOrder();
                $order->invoice=$ints;
                $order->customer=Session::get('ID');
                $order->shipping=Session::get('shippingId');
                $order->total=Session::get('total');
                $order->totalkg=Session::get('totalkg');
                $order->payment=$request->amount;
                $order->qty=Cart::getTotalQuantity();
                $order->shipcost=75;
                $order->packcost=0;
                $order->status_type=0;
                if( $order->save()){
                 
                   $payment=new AdminPayment();
                   $payment->order_id=$order->id;
                   $payment->pay_type=$request->type;
                   $payment->amount=$request->amount;
                   $payment->trxid=$request->trxid;
                   $payment->send_no=$request->number;
                   $payment->save();
   
                }  
                
                $cartProducts=Cart::getContent();
                foreach($cartProducts as $cartProduct){
                     $orderDetail= new AdminOrderdetails();
                     $orderDetail->order=$order->id;
                     $orderDetail->product_id= $cartProduct->id;
                     $orderDetail->product=$cartProduct->name;
                     $orderDetail->price=$cartProduct->price;
                     $orderDetail->qty=$cartProduct->quantity;
                     $orderDetail->kg=$cartProduct->attributes->weight*$cartProduct->quantity;
                     $orderDetail->total=$cartProduct->quantity*$cartProduct->price;
                     $orderDetail->save();
                }
                Cart::clear();
                session()->forget('shipping');
                session()->forget('pack');
                session()->forget('total');
                session()->forget('shippingId'); 
                return redirect('/')->with('order','ddd');
              }else{
                return redirect()->back()->with('not','ddd');
              }
            }else{
                return redirect()->back()->with('not','ddd');
              }            
    }



    public function loged(){    
        return view('singin&singup.singin.shiplogin');     
    } 
    public function shiplogin(Request $request){

		if($data=Customer::where('mobile',$request->phone)->first()){
          if($data->status==1){
			 if($data->mobile == $request->phone && Hash::check($request->password,$data->password)){
                            
               // dd($data);
					  Session::put('name',$data->name);
					  Session::put('type',$data->type);
					  Session::put('mobile',$data->mobile);
					  Session::put('ID',$data->id);
					  return redirect('/shipping');
						 
		  }else{
			  return redirect()->back()->with('passt','wrong');
		  }
			 }else{
                return redirect()->back()->with('deactivet','wrong');
			 }
		}else{
            return redirect()->back()->with('mobilest','wrong');
		}
	}



    public function registered(){  
            return view('singin&singup.singin.shipregister');  
    }
    public function registereds(Request $request){

        $extsnumber=Customer::where('mobile',$request->phone)->first();
        $digit=strlen($request->phone);
        if($extsnumber==null){
            if($digit==11){
              if(substr($request->phone, 0, 3)== "013" or substr($request->phone, 0, 3)
              == "014" or substr($request->phone, 0, 3)== "015" or substr($request->phone, 0, 3)
              == "016" or substr($request->phone, 0, 3)== "017"or substr($request->phone, 0, 3)
              == "018" or substr($request->phone, 0, 3)== "019"){

               $customer=New Customer();
               $customer->name=$request->name;
               $customer->mobile=$request->phone;
               $customer->password=bcrypt($request->password);
               $customer->status=1;
               $customer->type=2;
               $customer->save();

               Session::put('name',$request->name);
               Session::put('type',$customer->type);
               Session::put('mobile',$request->phone);
               Session::put('ID',$customer->id);

               return redirect('/shipping');

              }else{
               return redirect()->back()->with('valid','  Number'); 
              }
            }else{
               return redirect()->back()->with('valid','  Number'); 
            }

        }else{
           return redirect()->back()->with('ex','  Number');
        }

   }

    public function addtocart(Request $request){

     if($request->role==1){
        $products=Product::find($request->id);
        Cart::add([
            'id'=>$request->id,
            'quantity'=>$request->qty,
            'name'=>$products->name,
            'price'=>$products->price,       
            'attributes' => [
                'weight'=>$products->weight
                ]
            
          ]);
        return redirect()->back(); 
     }else{
        $products=Package::find($request->id);
        Cart::add([
            'id'=>$request->id,
            'quantity'=>$request->qty,
            'name'=>$products->name,
            'price'=>$products->price,
            'attributes' => [
                'weight'=>$products->weight,
                   ]
            
    
          ]);
        return redirect()->back(); 
     }           
    }

    public function cartupdates(Request $request){
        
       // dd($request->all());
        Cart::Update($request->id, [
            'quantity' => $request->qty,
           
        ]);
        return redirect()->back();
      }



public function deletecart($id){
    Cart::remove($id);
    return redirect()->back();
}


}
