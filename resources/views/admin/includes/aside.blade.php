<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/dashboard')}}" class="brand-link">
    <i class="fas fa-dove"></i>
      <span class="brand-text font-weight-light">BDMATI.COM</span>
      <i class="fas fa-dove"></i>
    </a>

    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{url('/dashboard')}}" class="nav-link ">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
               Home Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="{{url('/customer')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-user nav-icon"></i>
                  <p>Customer</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/slider')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-user nav-icon"></i>
                  <p>Sliders</p>
                  
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/package')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-user nav-icon"></i>
                  <p>Package</p>
                  
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-card"></i>
              <p>
                 Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/category')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-database nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
                <li class="nav-item">
                <a href="{{url('/product')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fa fa-database nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
            Order Managenment
             
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/pending')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-save nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="{{url('/approve')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-save nav-icon"></i>
                  <p>Approve</p>
                </a>
              </li>  
               <li class="nav-item">
                <a href="{{url('/shipment')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-save nav-icon"></i>
                  <p>Shipment</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{url('/success')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-save nav-icon"></i>
                  <p>Success</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{url('/cancel')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="fas fa-save nav-icon"></i>
                  <p>Cancel</p>
                </a>
              </li>      

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
               Invoice
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/todaysale')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>Today Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/sale')}}" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>Sale</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  &nbsp;&nbsp;<i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li> --}}
              
            </ul>
          </li>

              {{-- <li class="nav-item">
                <a href="" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                  <p>Contact</p>
                </a>
              </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>