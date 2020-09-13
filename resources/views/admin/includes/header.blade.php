<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{url('/')}}" class="nav-link">Home</a>
    </li>
   
  </ul>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3">
    <div class="input-group input-group-sm">
          <div class="input-group-append">
    
      </div>
       @if (session('add'))
        <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Added Successfully</strong>
        </div>
    @endif
       @if (session('update'))
        <div class="alert alert-dismissible alert-info">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Update Successfully</strong>
        </div>
    @endif
        @if (session('delete'))
        <div class="alert alert-dismissible alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Delete Successfully</strong>
        </div>
    @endif
    </div>
  </form>&nbsp;&nbsp;

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img style="border-radius: 50%;width: 30px;height: auto;" class="img-profile rounded-circle" src="{{asset('/img/favi.png')}}">&nbsp;
        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="#">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="#">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Settings
        </a>
        <a class="dropdown-item" href="Lang/bn">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          বাংলা
        </a>
      <a class="dropdown-item" href="Lang/en">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
         English
        </a>
       <a class="dropdown-item" href="#">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Activity Log
        </a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{url('/logout')}}" >
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>