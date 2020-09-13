@extends('admin.master')

@section('content')

<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/pending/update')}}" method="post" >
        @csrf
    <div class="modal-body">
        <div class="row">
 
            <div class="col-sm-12 form-group">
           <select class="col-sm-12 form-control" name="status_type">
           <option value="0">Pending</option>
           <option value="1">Aprove</option>
           <option value="2">Shipment</option>
           <option value="3">Success</option>
           <option value="4">Cancel</option>
           
           </select>

            <input class="cId" type="hidden" name="id" id="id">
        </div>
                                          
        </div>
       </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
</div>
</div>
</div>
</div>
<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-12"><h5 class="m-0 font-weight-bold ">All Pending Orders</h5></div>   
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Order</th>
              <th>Customer</th>
              <th>Qty</th>
              <th>Total</th>
              <th>Payment</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php  $l=1; ?>
         @foreach($result as $result)
              <td>{{$l++}}</td>
              <td>{{$result->invoice}}</td>
              <td>{{$result->name}}</td>
              <td>{{$result->qty}}</td>
              <td>{{$result->total}}</td>
              <td>{{$result->payment}}</td>
              <td>{{ date('d-M-Y', strtotime($result->created_at)) }}</td>
              <td><a href="" onclick= 'edit({{$result->id}});' data-toggle="modal" id="edit"
               data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" >Edit</a>
               <a href="{{url('order/view/'.$result->id)}}"><button class="btn btn-primary btn-sm">View</button></a>
               <a href="{{url('invoice/view/'.$result->id)}}"><button class="btn btn-success btn-sm">Invoice</button></a>
               
               </td>
           </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  
<script>
  function edit(id) {
          var x =id;
          
          $.ajax({
              type:'GET',
              url:"{{url('/pending/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.status_type').val(response.status_type);
                  $('.cId').val(response.id);
           
              },
              error:function(xhr,status,error){
                  console.log(error);
                  
              }
  
          });
      }
  $(document).ready(function(){
  });   
          
  </script>

@endsection