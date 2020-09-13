@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Package</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/package/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">  
          <div class="col-sm-6 form-group">
            <label>Name</label>
            <input class="form-control" required type="text"  name="name">
        </div>
          <div class="col-sm-6 form-group">
            <label>Price</label>
            <input class="form-control" required type="number"  name="price">
        </div>
          <div class="col-sm-6 form-group">
            <label>Weight</label>
            <input class="form-control"  required type="number"  name="weight">
        </div>
          <div class="col-sm-6 form-group">
            <label>One</label>
            <input class="form-control" required  type="text"  name="one">
        </div> 
          <div class="col-sm-6 form-group">
            <label>Two</label>
            <input class="form-control" required  type="text"  name="two">
        </div>
          <div class="col-sm-6 form-group">
            <label>Three</label>
            <input class="form-control" required  type="text"  name="three">
        </div> 
                                     
        </div>
       </div>
    <div class="modal-footer">
        <button type="reset" class="btn btn-primary" >Clear</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
</div>
</div>
</div>

{{-- Edit slider Modal --}}

<div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      <form enctype="multipart/form-data" action="{{url('/package/update')}}" method="post" >
        @csrf
         <div class="modal-body">
             <div class="row">  
          <div class="col-sm-6 form-group">
            <label>Name</label>
            <input class="form-control name" required type="text"  name="name">
             <input class="cId" type="hidden" name="id" id="id">
        </div>
          <div class="col-sm-6 form-group">
            <label>Price</label>
            <input class="form-control price" required type="number"  name="price">
        </div>
          <div class="col-sm-6 form-group">
            <label>Weight</label>
            <input class="form-control weight"  required type="number"  name="weight">
        </div>
          <div class="col-sm-6 form-group">
            <label>One</label>
            <input class="form-control one" required  type="text"  name="one">
        </div> 
          <div class="col-sm-6 form-group">
            <label>Two</label>
            <input class="form-control two" required  type="text"  name="two">
        </div>
          <div class="col-sm-6 form-group">
            <label>Three</label>
            <input class="form-control three" required  type="text"  name="three">
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


<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Package</h5></div>   
        <div class="col-md-6">
                {{-- <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Package Upload                
            </button> --}}
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Price </th>
              <th>Weight </th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
          @foreach($package as $pac)
           <tr>
             <td> {{$pac->name}} </td>
             <td>{{$pac->price}}</td>
             <td>{{$pac->weight}}</td>
            <td><a href="" onclick= 'edit({{$pac->id}});' data-toggle="modal" id="edit" 
            data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a></td>
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
              url:"{{url('/package/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.cId').val(response.id);
                  $('.name').val(response.name);          
                  $('.weight').val(response.weight);             
                  $('.price').val(response.price);             
                  $('.one').val(response.one);             
                  $('.two').val(response.two);             
                  $('.three').val(response.three);             
           
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