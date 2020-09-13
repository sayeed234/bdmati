@extends('font.master')
@section('title')
Payment || Family Fruits 
@endsection
@section('content')
 
     <div id="price" class="section secondary-section">
            <div class="container" >
            @if (session('not'))
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> Please Valid Sending Number</strong>
              </div>
              <br><br>
        @endif
        
                <div class="price-table row-fluid"style="margin-top:-30px;">
                   <div class="span4 price-column">
                        <h3>Cash Payment</h3>
                        <form method="post" action="{{url('/payment/store')}}">
                        @csrf
                        <ul class="list">                         
                            <li><strong>Cash On Delivery</strong></li>
                            <li><input type="hidden" readonly Value="0" name="amount" ></li>
                        
                            <input type="hidden" name="type" Value="Cash">
                        
                        </ul>
                         <button type="submit" class="button button-ps" onclick="alert('Confirm Your Order ?')">Confirm Order</button>
                        </form>
                    </div>


                    <div class="span4 price-column">
                        <h3>Bkash Payment</h3>
                        <form method="post" action="{{url('/payment/store')}}">
                        @csrf
                        <ul class="list">                         
                            <li><strong>Send Money 01318-712782</strong></li>
                            <li><input type="text" readonly Value="{{session::get('total')}}" name="amount" ></li>
                            <li><input type="text" required name="trxid" placeholder="TrxID" ></li>
                            <li><input type="number" required name="number" placeholder="Sending Number" ></li>
                            <input type="hidden" name="type" Value="Bkash">
                        
                        </ul>
                         <button type="submit" class="button button-ps" onclick="alert('Confirm Your Order ?')">Confirm Order</button>
                        </form>
                    </div>
               <div class="span4 price-column">
                        <h3>Rocket Payment</h3>
                        <form method="post" action="{{url('/payment/store')}}">
                        @csrf
                        <ul class="list">                         
                            <li><strong>Send Money 01750-7582620</strong></li>
                            <li><input type="text" readonly Value="{{session::get('total')}}" name="amount" ></li>
                            <li><input type="text"required name="trxid" placeholder="TrxID" ></li>
                            <li><input type="number" required name="number" placeholder="Sending Number" ></li>
                        <input type="hidden" name="type" Value="Rocket">
                        </ul>
                        <button type="submit" class="button button-ps" onclick="alert('Confirm Your Order ?')">Confirm Order</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
@endsection