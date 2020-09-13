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
use DateTime;

class ManageController extends Controller
{
    public function pending(){
        if(Session::get('type')==1){
            $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name')
            ->where('status_type',0)
            ->OrderBy('id','DESC')
            ->get();

         return view('admin.order.pending',compact('result'));
        }else{
      
     return redirect()->back();
        }
        
    }

    public function pending_edit($id){
        $data=AdminOrder::find($id);
        return $data;
    }
    public function pending_update(Request $request){
        $data=AdminOrder::find($request->id);
        $data->status_type=$request->status_type;
        $data->save();
        return redirect()->back()->with('update','fd');
    }
    public function pending_view($id){
        if(Session::get('type')==1){
            $order=AdminOrder::find($id);   
            $customer=Customer::where('id',$order->customer)->first();
            $shipping=AdminShipping::where('id',$order->shipping)->first();
            $details=AdminOrderdetails::where('order',$id)->get();
            $payment=AdminPayment::where('order_id',$id)->first();
            return view('admin.order.view',compact('order','customer','shipping','details','payment')); 
        }else{
        return redirect()->back();
        }
       
    }

    public function invoice_view($id){
        if(Session::get('type')==1){
            $order=AdminOrder::find($id);   
            $customer=Customer::where('id',$order->customer)->first();
            $shipping=AdminShipping::where('id',$order->shipping)->first();
            $details=AdminOrderdetails::where('order',$id)->get();
            $payment=AdminPayment::where('order_id',$id)->first();
            return view('admin.order.invoice',compact('order','customer','shipping','details','payment')); 
        }else{
        return redirect()->back();
        }
       
    }




    public function approve(){
        if(Session::get('type')==1){
            $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name')
            ->where('status_type',1)
            ->OrderBy('id','DESC')
            ->get();

         return view('admin.order.approve',compact('result'));
        }else{
      
     return redirect()->back();
        }
    }
    public function shipment(){
        if(Session::get('type')==1){
            $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name')
            ->where('status_type',2)
            ->OrderBy('id','DESC')
            ->get();

         return view('admin.order.shipment',compact('result'));
        }else{
      
     return redirect()->back();
        }
    }
    public function success(){
        if(Session::get('type')==1){
            $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name')
            ->where('status_type',3)
            ->OrderBy('id','DESC')
            ->get();

         return view('admin.order.success',compact('result'));
        }else{
      
     return redirect()->back();
        }
    }
    public function cancel(){
        if(Session::get('type')==1){
            $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name')
            ->where('status_type',4)
            ->OrderBy('id','DESC')
            ->get();

         return view('admin.order.cancel',compact('result'));
        }else{
      
     return redirect()->back();
        }
    }

    public function todaysale(Request $request){
        if(Session::get('type')==1){

            if($request->fromDate==''){
                $date = new DateTime("now");
                $result=DB::table('admin_orders')
                    ->join('customers','customers.id','=','admin_orders.customer')
                    ->select('admin_orders.*','customers.name','customers.mobile')
                    ->whereDate('admin_orders.created_at', '=', $date)
                    ->OrderBy('id','DESC')
                    ->get();
                    $datei= 0;
            }else{
                $date = new DateTime("now");
     $result=DB::table('admin_orders')
            ->join('customers','customers.id','=','admin_orders.customer')
            ->select('admin_orders.*','customers.name','customers.mobile')
            ->whereDate('admin_orders.created_at', '>=', $request->fromDate)
            ->whereDate('admin_orders.created_at', '<=', $request->toDate)
            ->OrderBy('id','DESC')
            ->get();
            $datei= $request->fromDate;
            }
        
           // dd($result);

            return view('admin.invoice.today',compact('result','datei'));
        }else{
      
     return redirect()->back();
        }

    }

    public function sale(Request $request){

        if(Session::get('type')==1){

            if($request->fromDate==''){
            $date = new DateTime("now");
            $result=DB::table('admin_orderdetails')
                   ->select('admin_orderdetails.product_id','admin_orderdetails.product',DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(total) as total_sale'))
                  ->groupBy('product_id','product')
                   ->orderBy('total_qty', 'DESC')
                   ->whereDate('admin_orderdetails.created_at', '=', $date)
                  ->get();
                //dd($result);
                $datei= 0;

            }else{
                $date = new DateTime("now");
            $result=DB::table('admin_orderdetails')
                   ->select('admin_orderdetails.product_id','admin_orderdetails.product',DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(total) as total_sale'))
                  ->groupBy('product_id','product')
                   ->orderBy('total_qty', 'DESC')
                   ->whereDate('admin_orderdetails.created_at', '>=', $request->fromDate)
                   ->whereDate('admin_orderdetails.created_at', '<=', $request->toDate)
                  ->get();

                  $datei= $request->fromDate;
            }
                return view('admin.invoice.sale',compact('result','datei'));


    }else{
      
        return redirect()->back();
           }
    }
}

      