<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('judul') &mdash; Hotelku</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">

  <link rel="stylesheet" href="{{asset('assets/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  @yield('css')
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        
          <div class="search-element">     
            <div class="search-backdrop"></div>
            
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{session('username')}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-divider"></div>
              <a href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Hotelku</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Hk</a>
          </div>
          <ul class="sidebar-menu">    
            
            @if(session('role')=='pengguna')
            <li ><a class="nav-link" href="/pesan_kamar"><i class="fas fa-hotel"></i> <span>Pesan Kamar</span></a></li>  
            <li ><a class="nav-link" href="/riwayat_pemesanan"><i class="fas fa-book"></i> <span>Riwayat Pemesanan</span></a></li>   
            @else
             <li ><a class="nav-link" href="/admin/dashboard"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li ><a class="nav-link" href="/admin/manajemen_kamar"><i class="fas fa-bed"></i> <span>Manajemen Kamar</span></a></li>
            <li ><a class="nav-link" href="/admin/riwayat_pemesanan"><i class="fas fa-book"></i> <span>Riwayat Pemesanan</span></a></li>   
            @endif                 
          </ul>
      </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('judul')</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>
     
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <script src="{{asset('assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('assets/js/page/modules-datatables.js')}}"></script>

  <script type="text/javascript">
    
        $(document).ready(function() {

            $('#tabel-1').DataTable();

        });

  </script>

  @yield('js')
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
</body>
</html>