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
      <form enctype="multipart/form-data" action="" method="post" >
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
    
        <div class="col-md-2"><h5 class="m-0 font-weight-bold ">Today Sale</h5></div>   
        <div class="col-md-10"><div class="ibox-head">
<div class="card-body">                                           
<form action="{{url('/sale')}}" method="get"> 
        @csrf   
            <div class="row">
                <div class="col-md-6 ">
                    <div class="row">
                    <div class="col-md-3">
                             <form> 
                 <input type="button"  class="btn btn-info" value="Print" 
                    onclick="window.print()" /> 
                     </form>
                        </div>
                        <div class="col-md-2">
                            <label style="float: center;">From:</label>
                        </div>
                        <div class="col-md-5" style="float: right;">
                            <input type="date"  required  name="fromDate" value="{{$datei}}" class="form-control "/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="row">
                        <div class="col-md-1"><label>To:</label></div>
                        <div class="col-md-5 "><input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" name="toDate"
                            /></div>
                        <div class="col-md-4 "><input type="submit" class="btn btn-success" value="Load"/>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div></div>   
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table  class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>    
              <th>Total Qty</th>
             <th>Total Sale</th>

              
            </tr>
          </thead>
          <tbody>
          <?php $l=1; ?>
         @foreach($result as $result)
              <td>{{$l++}}</td>
              <td>{{$result->product}}</td>
              <td>{{$result->total_qty}}</td>
              <td>{{$result->total_sale}}</td>
              
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