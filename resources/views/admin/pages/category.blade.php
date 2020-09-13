@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Category Entry</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/category/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
 
            <div class="col-sm-12 form-group">
            <label>Category</label>
            <input class="form-control"  type="text"  name="category">
        </div>  
         <div class="col-sm-12 form-group">
            <label>Quota</label>
            <input class="form-control"  type="text"  name="quota">
        </div>
         <div class="col-sm-12 form-group">
            <label>Banner</label>
            <input class="form-control"  type="file"  name="image">
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
      <form enctype="multipart/form-data" action="{{url('/category/update')}}" method="post" >
        @csrf
    <div class="modal-body">
        <div class="row">
 
            <div class="col-sm-12 form-group">
            <label>Category</label>
            <input class="form-control category"  type="text"  name="category">
            <input class="cId" type="hidden" name="id" id="id">
        </div>
          <div class="col-sm-12 form-group">
            <label>Quota</label>
            <input class="form-control quota"  type="text"  name="quota">
        </div>
             <div class="col-sm-12 form-group">
            <label>Banner</label>
            <input class="form-control image"  type="file"  name="image">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Category</h5></div>   
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Category Upload                
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Category</th>
              <th>Banner</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($category as $cat)
           <tr>
             <td>{{$cat->category}}</td>
           <td><img src="{{asset($cat->image)}}"   style="height:80px; width:280px;"></td>

              <td><a href="" onclick= 'edit({{$cat->id}});' data-toggle="modal" id="edit"
               data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a>
                <a href="{{url('/category/delete/'.$cat->id)}}" onclick="alert('Confirm Delete')" class="btn btn-sm btn-danger" >Delete</a>               
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
              url:"{{url('/category/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.category').val(response.category);
                  $('.quota').val(response.quota);
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