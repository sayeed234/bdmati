@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Product Entry</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/product/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 form-group">
            <label>Category</label>
              <select class="form-control" name="category">
              @foreach($category as $cate)
             <option value="{{$cate->id}}">{{$cate->category}}</option>
             @endforeach
            </select>
        </div>   
          <div class="col-sm-6 form-group">
            <label>Name</label>
            <input class="form-control" required type="text"  placeholder="Potato,Egg,Alu" name="name">
        </div>
          <div class="col-sm-6 form-group">
            <label>Price</label>
            <input class="form-control" required type="number" placeholder="45"  name="price">
        </div>
          <div class="col-sm-6 form-group">
            <label>Weight</label>
            <input class="form-control"  required type="number" placeholder="0-9"  name="Weight">
        </div>
          <div class="col-sm-6 form-group">
            <label>Size</label>
            <input class="form-control" required  placeholder="XL,XXL,M" type="text"  name="size">
        </div>
          <div class="col-sm-6 form-group">
            <label>Stock</label>
            <select class="form-control" name="stock">
             <option value="Upcoming">Upcoming</option>
             <option value="Available">Available</option>
             <option value="Stockout">Stockout</option>
            </select>
            
        </div>  
        <div class="col-sm-12 form-group">
            <label>Details</label>
            <textarea class="form-control" required  type="text"  name="details"></textarea>
        </div> 
        <div class="col-sm-12 form-group">
            <label>Image</label>
            <input class="form-control" required  type="file"  name="image">
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
      <form enctype="multipart/form-data" action="{{url('/product/update')}}" method="post" >
        @csrf
         <div class="modal-body">
          <div class="row">
            <div class="col-sm-6 form-group">
            <label>Category</label>
              <select class="form-control category" name="category">
              @foreach($category as $cate)
             <option value="{{$cate->id}}">{{$cate->category}}</option>
             @endforeach
            </select>
             <input class="cId" type="hidden" name="id" id="id">
        </div>   
          <div class="col-sm-6 form-group">
            <label>Name</label>
            <input class="form-control name" required type="text"  name="name">
        </div>
          <div class="col-sm-6 form-group">
            <label>Price</label>
            <input class="form-control price" required type="number"  name="price">
        </div>
          <div class="col-sm-6 form-group">
            <label>Weight</label>
            <input class="form-control weight"  required type="number"  name="Weight">
        </div>
          <div class="col-sm-6 form-group">
            <label>Size</label>
            <input class="form-control size" required  type="text"  name="size">
        </div>
          <div class="col-sm-6 form-group">
            <label>Stock</label>
            <select class="form-control stock" name="stock">
             <option value="Upcoming">Upcoming</option>
             <option value="Available">Available</option>
             <option value="Stockout">Stockout</option>
            </select>
            
        </div>  
        <div class="col-sm-12 form-group">
            <label>Details</label>
            <textarea class="form-control details" required  type="text"  name="details"></textarea>
        </div> 
        <div class="col-sm-12 form-group">
            <label>Image</label>
            <input class="form-control image" type="file"  name="image">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Products</h5></div>   
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Product Upload                
            </button>
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
              <th>Image </th>
              <th>Action </th>
            </tr>
          </thead>
          <tbody>
          @foreach($product as $prod)
           <tr>
             <td> {{$prod->name}} </td>
             <td>{{$prod->price}}</td>
             <td>{{$prod->weight}}</td>
           <td><img src="{{asset($prod->image)}}"   style="height:50px; width:80px;"></td>
            <td><a href="" onclick= 'edit({{$prod->id}});' data-toggle="modal" id="edit" 
            data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a>
                <a href="{{url('/product/delete/'.$prod->id)}}" onclick="alert('Confirm Delete')"  class="btn btn-sm btn-danger" >Delete</a>               
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
              url:"{{url('/product/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.category').val(response.category);
                  $('.cId').val(response.id);
                  $('.name').val(response.name);
                  $('.details').val(response.details);             
                  $('.weight').val(response.weight);             
                  $('.price').val(response.price);             
                  $('.size').val(response.size);             
                  $('.stock').val(response.stock);             
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