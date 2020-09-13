<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Customer;
use App\Admin\Product;
use App\AdminOrder;
use App\AdminOrderdetails;
use App\AdminPayment;
use App\AdminShipping;
use App\Admin\Package;
use DB;
use Session;
use Hash;
use DateTime;



class adminController extends Controller{



	public function admin(){

		if(Session::get('type')==1){
            $date = new DateTime("now");
		   
			$pending=DB::table('admin_orders')
				->join('customers','customers.id','=','admin_orders.customer')
				->select('admin_orders.*','customers.name')
				->where('status_type',0)
				->OrderBy('id','DESC')
				->count();
 
			$approve=DB::table('admin_orders')
				->join('customers','customers.id','=','admin_orders.customer')
				->select('admin_orders.*','customers.name')
				->where('status_type',1)
				->OrderBy('id','DESC')
				->count();
		$shipment=DB::table('admin_orders')
				->join('customers','customers.id','=','admin_orders.customer')
				->select('admin_orders.*','customers.name')
				->where('status_type',2)
				->OrderBy('id','DESC')
				->count();
 
		$success=DB::table('admin_orders')
				->join('customers','customers.id','=','admin_orders.customer')
				->select('admin_orders.*','customers.name')
				->where('status_type',3)
				->OrderBy('id','DESC')
				->count();

		$todaysale=DB::table('admin_orders')
				->select( DB::raw('SUM(total) as total_sale'))
				->whereDate('admin_orders.created_at', '=', $date)
				->first();
				
	    $todaypayment=DB::table('admin_orders')
				->select( DB::raw('SUM(payment) as payment'))
				->whereDate('admin_orders.created_at', '=', $date)
				->first();
		$todayqty=DB::table('admin_orders')
				->select( DB::raw('SUM(qty) as qty'))
				->whereDate('admin_orders.created_at', '=', $date)
				->first();
				
		 $sale=DB::table('admin_orders')
				->select( DB::raw('SUM(total) as total_sale'))
				->first();
		$qty=DB::table('admin_orders')
				->select( DB::raw('SUM(qty) as total_qty'))
				->first();
		$customer=Customer::count();
       // dd($customer);


			return view('admin.home.homeContent',compact('pending','approve','shipment',
			'success','todaysale','todaypayment','todayqty','sale','qty','customer')); 
		}else{
			return redirect()->back();
		}		
	}

	public function customer(){

		if(Session::get('type')==1){
           $customer=Customer::Orderby('id','DESC')->get();
			return view('admin.pages.customer',compact('customer')); 
		}else{
			return redirect()->back();
		}		
	}



	public function login(){
		return view('singin&singup.singin.login');
	}

	public function customerlog(Request $request){

		if($data=Customer::where('mobile',$request->phone)->first()){
          if($data->status==1){
			 if($data->mobile == $request->phone && Hash::check($request->password,$data->password)){
				 
			
					if($data->type==2){
					  Session::put('name',$data->name);
					  Session::put('type',$data->type);
					  Session::put('mobile',$data->mobile);
					  Session::put('ID',$data->id);
					
					  return redirect('/');
					
					}else{
					  Session::put('name',$data->name);
					  Session::put('type',$data->type);
					  Session::put('mobile',$data->mobile);
					  Session::put('ID',$data->id);
					  return redirect('/dashboard');
					}
			 
		  }else{
			  return redirect('/login')->with('pass','wrong');
		  }
			 }else{
				return redirect('/login')->with('deactive','wrong');
			 }
		}else{
			return redirect('/login')->with('mobiles','wrong');
		}
	}

	public function logout(){           
		session()->forget('mobile');
	    session()->forget('name');
	    session()->forget('type');
	    session()->forget('ID');  
		return redirect('/');	
	}

	public function register(){
		return view('singin&singup.singin.register');
	}
	
	public function registation(Request $request){

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

				return redirect('/')->with('statuss','Registration successfully');

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

	public function forget(){
		return view('singin&singup.singin.forget');
	}

	public function forgetpass(Request $request){

		if($data=Customer::where('mobile',$request->phone)->first()){
			if($data->status==1){
			   $data->password=bcrypt($request->password);
			   $data->save();
			   return redirect('/login')->with('log','wrong');
			}else{
				return redirect()->back()->with('deactive','wrong');
			}
		}else{
			return redirect()->back()->with('mobiles','wrong');
		}


}


}
