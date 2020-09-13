@extends('admin.master')

@section('content')

<div class="card shadow">
    <div class="card-header ">
    <br>
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Customer List</h5></div>   
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table id="example" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SL</th>
              <th>Name</th>
              <th>Mobile</th>
              <th>joing</th>
            </tr>
          </thead>
          <tbody>
          <?php $l=1; ?>
          @foreach($customer as $pac)
           <tr>
             <td> {{$l++}} </td>
             <td>{{$pac->name}}</td>
             <td>0{{$pac->mobile}}</td>
              <td>{{ date('d-M-Y', strtotime($pac->created_at)) }}</td>
            
           </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>  

@endsection