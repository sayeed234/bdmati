@extends('singin&singup.master_singin&up')
@section('mainContent')

<body >

<h3 class="text-center text-success">{{ Session::get('successmessage') }}</h3>

    <form class="form-login" method="get" action="{{url('/shiplogin')}}">
      {{ csrf_field() }}
        <h2 class="form-login-heading">Login </h2>
          @if (session('passt'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Please Enter Valid Password!!!!</strong>
                        </div>
                    @endif
            @if (session('mobilest'))
              <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong> Please Enter Valid Mobile!!!!</strong>
              </div>
        @endif
           @if (session('deactivet'))
                        <div class="alert alert-dismissible alert-danger">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> You Are Deactive!!!!</strong>
                        </div>
              @endif
                 @if (session('log'))
                        <div class="alert alert-dismissible alert-info">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <strong> Password change,Try to login</strong>
                        </div>
              @endif


        <div class="login-wrap"style="height:250px;">
          <input type="number" class="form-control" required placeholder="Phone No" name="phone" autofocus>
        
          <br>
          
               <input type="password" class="form-control" required placeholder="Password" name="password" id="showPass" >
               <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"  onclick="myFunction()"></span>
            
         <br>
          <button class="btn btn-theme btn-block" name="btn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <a href="{{url('/forget')}}">Forget Password?</a>

        </div>
        </form>
        <div class="text-center" style="margin-top:-60px;">
             <div class="row">
             <div class="col-md-4"></div>
              <div class="col-md-2 col-6"><a href="{{url('/cart')}}"><button class="btn btn-sm btn-primary btn-block">Back</button></a></div>
              <div class="col-md-2 col-6"><a href="{{url('/registered')}}"><button class="btn btn-block btn-sm btn-primary">Register</button></a></div>
              <div class="col-md-4"></div>
             </div>
              
             </div>
</form>
</body>


    
@endsection