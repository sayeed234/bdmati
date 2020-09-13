@extends('singin&singup.master_singin&up')
@section('mainContent')

<body  >

<h3 class="text-center text-success">{{ Session::get('successmessage') }}</h3>

    <form class="form-login" method="post" action="{{url('/registereds')}}">
      {{ csrf_field() }}
        <h2 class="form-login-heading">Registration </h2>
          @if (session('ex'))
                        <div class="alert alert-dismissible alert-warning">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> This Number Already Register</strong>
                        </div>
                    @endif
           @if (session('valid'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Sign Up with Valid Phone No.</strong>
                        </div>
              @endif


        <div class="login-wrap" style="height:300px;">
          <input type="text" class="form-control" placeholder="Full Name" required name="name" autofocus>
          <br>
          <input type="number" class="form-control" placeholder="Phone No Ex.017xxxxxxxx" required name="phone" autofocus>
        
          <br>
          
               <input type="password" class="form-control" placeholder="Password" name="password" required id="showPass" >
               <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"  onclick="myFunction()"></span>
            
         <br>
          <button class="btn btn-theme btn-block" name="btn" type="submit"> SIGN UP</button>
          <br>
          <div class="copywrite text-center" style="font-size: 12px;margin-top: 15px;">
     
        </div>
          </div>
          </form>
        
             <div class="text-center" style="margin-top:-60px;">
             <div class="row">
             <div class="col-md-4"></div>
              <div class="col-md-2"><a href="{{url('/cart')}}"><button class="btn btn-sm btn-primary btn-block">Back</button></a></div>
              <div class="col-md-2"><a href="{{url('/loged')}}"><button class="btn btn-block btn-sm btn-primary">Login</button></a></div>
              <div class="col-md-4"></div>
             </div>
              
             </div>
        </div>
        
</body>


    
@endsection