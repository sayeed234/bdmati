  <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="{{url('/')}}" class="brand" style="font-size:30px;">
                 <img src="{{asset('/img/logo.png')}}" width="120" height="50" alt="Logo" >
                    
                    {{-- <b>BDMATI.COM</b> --}}
                    </a>
              

                   <a href="{{url('/cart')}}" ><button type="button"  style="margin-left:50px;" class="btn btn-danger">
                     <img src="{{asset('website/images/clients/cart.png')}}" style="height:30px;"><span class="badge badge-info">{{Cart::getTotalQuantity()}}</span>
                    </button></a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/')}}#portfolio">Products</a></li>
                            {{-- <li><a href="#about">About Us</a></li>
                            <li><a href="#clients">FAQ</a></li> --}}
                            @if(Session::get('type')==2)
                             <li><a href="{{url('/customer_order')}}">Orders</a></li>
                            @endif
                            @if(Session::get('type')==1)
                            <li><a href="{{url('/dashboard')}}">Dashboard</a></li>
                            @elseif(session::get('type')==2)
                             <li><a href="{{url('/logout')}}">Logout</a></li>
                            @else
                             <li><a href="{{url('/login')}}">Login</a></li>
                             @endif
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>

        