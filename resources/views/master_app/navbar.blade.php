<!-- Left navbar links -->


<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->


  <li class="nav-item">
    <a href="dashboard" class="nav-link {{Request::is('dashboard')? 'active':''  }}">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p class="text">dashboard</p>
    </a>
  </li>


  <li class="nav-header">Data</li>
  {{-- <li class="nav-item">
    <a href="{{route('dataibu.index')}}" class="nav-link {{Request::is('dataibu')? 'active':''  }}">
      <i class="nav-icon far fa-circle text-danger"></i>
      <p class="text">DATA IBU</p>
    </a>
  </li> --}}
  <li class="nav-item">
    <a href="{{route('dataanak.index')}}" class="nav-link {{Request::is('dataanak')? 'active':''  }}">
      <i class="nav-icon far fa-circle text-warning"></i>
      <p>DATA ANAK</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{route('dataposyandu.index')}}" class="nav-link {{Request::is('dataposyandu')? 'active':''  }}">
      <i class="nav-icon far fa-circle text-danger"></i>
      <p>DATA POSYANDU</p>
    </a>
  </li>

  <li class="nav-item">
    <a href="chart" class="nav-link {{Request::is('chart')? 'active':''  }}">
      <i class="nav-icon far fa-circle text-info"></i>
      <p>Grafik</p>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout') }}">
    <i class="nav-icon far fa-circle text-info"></i>
      <p>Logout</p></a>
</li>
</ul>





  