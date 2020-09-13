@extends('font.master')
@section('title')
Order || Family Fruits 
@endsection
@section('content')
        <div id="price" class="section secondary-section">
            <div class="container">
                <div class="price-table row-fluid" style="margin-top:-30px;">
                    <div class="span6 price-column">
                        <h3>My Profile</h3>
                        <ul class="list">
                            <li><strong>Name:</strong> {{Session::get('name')}}</li>
                            <li><strong>Mobile:</strong> {{Session::get('mobile')}}</li>
                         
                        </ul>
                      
                    </div>
                    <div class="span6 price-column">
                        <h3>My Orders</h3>

                        <ul class="list">
                             <li><strong>Total Order : </strong>{{$count}}</li>
                             <li><strong>Total Amount : </strong>{{$result->cost}} ৳</li>
                             <li><strong>Total Weight : </strong>{{$result->kg}} KG</li>
                          
                        </ul>
                      
                    </div>

                </div>
              
            </div>
            

             <div class="container">
                <div class="price-table row-fluid" style="margin-top:-30px;">

                @foreach($order as $order)
                    <div class="span4 price-column">
                        <h3>Order NO: {{$order->invoice}} <br> <span>Date:{{ date('d-M-Y', strtotime($order->created_at)) }}</span></h3>

                        @if($order->status_type==0)
                             <button class="btn btn-sm btn-warning">Pending</button>
                         @elseif($order->status_type==1)
                          <button class="btn btn-sm btn-info">Approve</button>
                         @elseif($order->status_type==2)
                          <button class="btn btn-sm btn-primary">Shipment</button>
                          @elseif($order->status_type==3)
                    <button class="btn btn-sm btn-success">Success</button>
                       @else
                    <button class="btn btn-sm btn-danger">Cancel</button>

                         @endif
                       
                        <ul class="list">
                            <li><strong>Total Amount :</strong> {{$order->total}} ৳</li>
                            <li><strong>Total Weight :</strong> {{$order->totalkg }} KG</li>
                            <li><strong>Product</strong> </li>
                        </ul>

                        <?php $details=DB::table('admin_orderdetails')->where('order',$order->id)->get(); ?>
                      <ol style="color:black;text-align:left">
                      @foreach($details as $d)
                   <li><a herf="">{{$d->product}}</a> </li> 
                      @endforeach
                      </ol>
                    </div>
                  @endforeach
                    

                </div>
              
            </div>


        </div>

@endsection