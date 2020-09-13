@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="container">
<div class="row">
    <div class="col-md-4">
    <div class="card">
  <div class="card-header">
  Order
  </div>
  <div class="card-body">
   <table class="table table-striped table-bordered">
 
  <tbody>
    <tr>
      <td>Order ID</td>
      <td>{{$order->invoice}}</td>
    </tr>
    <tr>
      <td>Total</td>
      <td>{{$order->total}} ৳</td>
    </tr>
    <tr>
      <td>Payment</td>
      <td>{{$order->payment}} ৳</td>
    </tr>
    <tr>
      <td>Total </td>
      <td>{{$order->totalkg}} KG</td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
</div>
   <div class="col-md-4">
    <div class="card">
  <div class="card-header">
  Customer
  </div>
  <div class="card-body">
   <table class="table table-striped table-bordered">
 
  <tbody>
    <tr>

      <td>Name</td>
      <td>{{$customer->name}}</td>
    </tr>
    <tr>

      <td>Mobile</td>
      <td>0{{$customer->mobile}}</td>
      
    </tr>
     <tr>

      <td>Shipping</td>
      <td>{{$order->shipcost}} ৳</td>
      
    </tr> 
    <tr>

      <td>Packing</td>
      <td>{{$order->packcost}} ৳</td>
      
    </tr>
    
  </tbody>
</table>
  </div>
</div>
</div>

<div class="col-md-4">
<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col-md-6">Payment</div>   
        <div class="col-md-6"><a href="{{url('/pending')}}"><button class="btn btn-sm btn-info">Pending List</button></a></div>   
    </div> 
  </div>
  <div class="card-body">
   <table class="table table-striped table-bordered">
 
  <tbody>
    <tr>
      <td>Payment Type</td>
      <td>{{$payment->pay_type}}</td>
    </tr>
    <tr>
      <td>Amount</td>
      <td>{{$payment->amount}} ৳</td>     
    </tr> 
    <tr>
      <td>TrxID</td>
      <td>{{$payment->trxid}}</td>     
    </tr>    
    <tr>
      <td>Sending Number</td>
      <td>0{{$payment->send_no}}</td>     
    </tr> 
  </tbody>
</table>
  </div>
</div>

</div>
<div class="col-md-6">
<div class="card">
  <div class="card-header">
   Shipping
  </div>
  <div class="card-body">
   <table class="table table-striped table-bordered">
 
  <tbody>
    <tr>
      <td>Name</td>
      <td>{{$shipping->name}}</td>
    </tr>
   <tr>
      <td>Email</td>
      <td>{{$shipping->email}}</td>
    </tr>
    <tr>
      <td>Mobile</td>
      <td>0{{$shipping->phone}}</td>
    </tr>
    <tr>
      <td>Division</td>
      <td>{{$shipping->division}}</td>
    </tr>
    <tr>
      <td>District</td>
      <td>{{$shipping->district}}</td>
    </tr>
    <tr>
      <td>Courier</td>
      <td>{{$shipping->courier}}</td>
    </tr>
     <tr>
      <td>Address</td>
      <td>{{$shipping->address}}</td>
    </tr>
  </tbody>
</table>
  </div>
</div>

</div>
<div class="col-md-6">
<div class="card">
  <div class="card-header">
   Products
  </div>
  <div class="card-body">
   <table class="table table-striped table-bordered">
 
  <tbody>
    <tr class="bg-info">
      <td>Name</td>
      <td>KG</td>
      <td>Qty</td>
      <td>Price</td>
      <td>total</td>
    </tr>
    @foreach($details as $details)
    <tr>
      <td>{{$details->product}}</td>
      <td>{{$details->kg}}</td>
      <td>{{$details->qty}}</td>
      <td>{{$details->price}}</td>
      <td>{{$details->qty*$details->price}}</td>
 
    </tr> 
   @endforeach
  </tbody>
</table>
  </div>
</div>

</div>
</div>
</div>
</div>
@endsection