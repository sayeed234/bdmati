@extends('font.master')
@section('title')
My Cart || Family Fruits 
@endsection
@section('content')
   <div id="price" class="section secondary-section">
            <div class="container">
                <div class="row" style="margin-top:-50px;">
                   <div class="price-table row-fluid">                  
                     <div class="span8 price-column">
                        <h3>My Cart ( {{Cart::getTotalQuantity()}} Item ) </h3>
                        <ul class="list">
         <?php $shipingcost=0; $total=0; $shipping=0; $pack=0; $totalkg=0; ?>
               @foreach($cartProduct as $cart)                  
                            <li style="text-align:left">
                            <div class="span5"><b>{{$cart->name}}</b> <br>
                           <span style="font-size:15px;">{{$cart->attributes->weight*$cart->quantity}}KG</span> 
                            <br>
                            </div>
                          <div class="span4">
                     
                    <form action="{{url('/cartupdate')}}" method="get"  >
                          @csrf

                             <input type="number" name="qty" min="1" value="{{$cart->quantity}}"style="width:57px;"><br>
                            <input type="hidden" name="id" value="{{$cart->id}}" /> 

                             <button type="submit" class="btn btn-sm btn-success">Update</button>
                            

                             </form>
                            </div>        
                            <div class="span3">{{$cart->price*$cart->quantity}} ৳ <br>
                            <a href="{{ url('/deletecart',['id'=>$cart->id]) }}" onclick="return confirm('Confirm Remove This Product ?');"><b>x</b></a>
                            </div> 
                            <hr>       
                             </li>
                          <?php $totalkg=$totalkg+($cart->attributes->weight*$cart->quantity) ?>
                        <?php $shipingcost=$shipingcost+($cart->attributes->weight*$cart->quantity) ?>  
                @endforeach
                        <?php 
                  Session::put('totalkg',$totalkg);
                  ?>    
                        </ul>
                       <br><br><br><br> 
                       <a href="{{url('/shipping')}}"><button class="btn btn-warning ">Continue Shipping</button></a>
                    </div>
                      <div class="span4 price-column">
                    <br><br>
                   
                    <table class="table table-bordered table-light ">
                    <tbody style="color:gray;">
                   
                        <tr>
                        <td>Subtotal</td>
                        <td>{{Cart::getTotal()}} ৳</td>
                        </tr>
                        <tr>
                        <td>Shipping</td>
                        <td>75 ৳</td>
                        </tr>
                         <tr>
                        <td>Total </td>
                        <td>{{$total=Cart::getTotal()+75}} ৳</td>
                        </tr>
                         <?php 
                  Session::put('total',$total);
                  ?>
                         <tr>
                        <td><b>Payble Total</b></td>
                      <td><b>{{Cart::getTotal()+75}} ৳</b></td>
                        </tr>
                    </tbody>
                    </table>
                       
                    </div>
                </div>
           
                   
                </div>
            </div>
            <br>   
        </div>
     
@endsection