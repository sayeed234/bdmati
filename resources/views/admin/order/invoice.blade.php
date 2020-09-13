@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="container">
<h3 style="text-align:center;"><b>bdmati.com</b></h3>
<h4 style="text-align:center;">01912-619757, 01676-588917</h4>
<h4 style="text-align:center;">59-Kalabagan 1st Lane</h4>
<div class="row">
    <div class="col-md-6">
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
      <td>Pay </td>
      <td></td>
    </tr>
   
  </tbody>
</table>
  </div>
</div>
</div>
   <div class="col-md-6">
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

      <td>Signature</td>
      <td></td>
      
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
<br><br>
 <input type="button"  class="btn btn-info" value="Print" 
                    onclick="window.print()" /> 
</div>
</div>
</div>
</div>
@endsection