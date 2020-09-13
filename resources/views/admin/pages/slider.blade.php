@extends('admin.master')

@section('content')
<div class="page-content fade-in-up">
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">Slider Entry</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form enctype="multipart/form-data" action="{{url('/slider/store')}}" method="post">
  @csrf
    <div class="modal-body">
        <div class="row">
 
            <div class="col-sm-12 form-group">
            <label>Heading</label>
            <input class="form-control"  type="text"  name="heading">
        </div>
        <div class="col-sm-12 form-group">
            <label>Title</label>
            <input class="form-control" required  type="text"  name="title">
        </div> 
            <div class="col-sm-12 form-group">
            <label>Details</label>
    <textarea class="form-control" type="text" name="details" ></textarea>
        </div> 
        <div class="col-sm-12 form-group">
            <label>Image</label>
    <input class="form-control" type="file" name="image" >
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
      <form enctype="multipart/form-data" action="{{url('/slider/update')}}" method="post" >
        @csrf
    <div class="modal-body">
        <div class="row">
 
            <div class="col-sm-12 form-group">
            <label>Heading</label>
            <input class="form-control heading"  type="text"  name="heading">
            <input class="cId" type="hidden" name="id" id="id">
        </div>
        <div class="col-sm-12 form-group">
            <label>Title</label>
            <input class="form-control title" required  type="text"  name="title">
        </div> 
            <div class="col-sm-12 form-group">
            <label>Details</label>
    <textarea class="form-control details" type="text" name="details" ></textarea>
        </div> 
        <div class="col-sm-12 form-group">
            <label>Image</label>
    <input class="form-control image" type="file" name="image" >
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Expense History</h5></div>   
        <div class="col-md-6">
                <button type="button" class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                    Slider Upload                
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Heading</th>
              <th>Title</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($slider as $s)
           <tr>
             <td>{{$s->header}}</td>
             <td>{{$s->title}}</td>
           <td><img src="{{asset($s->image)}}"   style="height:50px; width:80px;"></td>
             <td><a href="" onclick= 'edit({{$s->id}});' data-toggle="modal" id="edit" data-target="#exampleModalCenter_edit" class="btn btn-sm btn-info" > Edit</a></td>
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
              url:"{{url('/slider/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.heading').val(response.header);
                  $('.cId').val(response.id);
                  $('.title').val(response.title);
                  $('.details').val(response.details);             
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