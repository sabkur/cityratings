<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/TA/logo.png" type="image/ico" />

    <title>City Ratings</title>

</head>
<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link href="{!! asset('../template/vendors/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">
<!-- Font Awesome -->
<link href="{!! asset('../template/vendors/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
<!-- NProgress -->
<link href="{!! asset('../template/vendors/nprogress/nprogress.css') !!}" rel="stylesheet">
<!-- iCheck -->
<link href="{!! asset ('../template/vendors/iCheck/skins/flat/green.css') !!}" rel="stylesheet">

<!-- bootstrap-progressbar -->
<link href="{!! asset ('../template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') !!}" rel="stylesheet">
<!-- JQVMap -->
<link href="{!! asset ('../template/vendors/jqvmap/dist/jqvmap.min.css') !!}" rel="stylesheet"/>
<!-- bootstrap-daterangepicker -->
<link href="{!! asset ('../template/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>

<!-- Custom Theme Style -->
<link href="{!! asset ('../template/build/css/custom.css') !!}" rel="stylesheet">

<style type="text/css">
  #tabelKota{border-color: #a6a6a6;}
  #tabelInfrastruktur{border-color: #a6a6a6;}
  #tabelInvestasi{border-color: #a6a6a6;}
  #tabelPariwisata{border-color: #a6a6a6;}
  #tabelPelayananPublik{border-color: #a6a6a6;}
  #tabel{border-color: #a6a6a6;}

  .container-content{
    background-color:white;
    box-shadow: 0 0 5px 2px rgba(0,0,0,0.3);
    padding:2%;
    margin-top:6%;
  }

  input{
    line-height: 20px !important;
  }
</style>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span style="margin-left: 6%">CITY RATINGS</span></a>
          </div>

          <div class="clearfix"></div>


          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
           <li class="active">
            <ul >
              <img src="/img/city.png" style="height: 85px; width:95px; margin-top:0px; margin-left: 8px;">
          </ul>
      </li> 
      <div class="menu_section">
        <h3>Menu</h3>
        <ul class="nav side-menu">
          <li><a href="/beranda"><i class="fa fa-home"></i> Dashboard <span class="#"></span></a>
          </li>
          <li><a href="/edit_profile"><i class="fa fa-user"></i> Profile </a>
          </li>
          <li><a><i class="fa fa-bar-chart"></i> Infografis <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="/info_investasi">Investasi</a></li>
              <li><a href="/info_infrastruktur">Infrastruktur</a></li>
              <li><a href="/info_pariwisata">Pariwisata</a></li>
              <li><a href="/info_pelayanan_publik">Pelayanan Publik</a></li>
          </ul>
      </li>
      <li><a><i class="fa fa-database"></i> Manajemen Data <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="/data_kota">Data Kota</a></li>
            <li><a href="/data_investasi">Data Investasi</a></li>
            <li><a href="/data_infrastruktur">Data Infrastruktur</a></li>
            <li><a href="/data_pariwisata">Data Pariwisata</a></li>
            <li><a href="/data_pelayanan_publik">Data Pelayanan Publik</a></li>
        </ul>
      </li>
      <li><a><i class="fa fa-balance-scale"></i> Manajemen Bobot <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="/manajemen_bobot">Manajemen Bobot Utama</a></li>
            <li><a href="/manajemen_bobot_investasi">Manajemen Bobot Investasi</a></li>
            <li><a href="/manajemen_bobot_infrastruktur">Manajemen Bobot Infrastruktur</a></li>
        </ul>
      </li>
    </li>
</ul>
</div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="/beranda/logout">logout</a>" style="width: 100%;">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    Log Out
</a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle" style="padding-bottom: 16px;">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="">
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
        </ul>
    </li>
</ul>
</nav>
<div style="margin-left: 12%; padding-top: 1.1%; font-size: 1.7em; color: #005580;"> <b> SISTEM PENDUKUNG KEPUTUSAN UNTUK MENGUKUR DERAJAT KEMAJUAN KOTA </b>  </div>
</div>
</div>
<!-- /top navigation -->

<!-- page content -->
<div class="right_col" role="main">
    @yield('content')
    
</div>
<!-- /page content -->

<!-- footer content -->

<!-- /footer content -->
</div>

</div>
<footer style="padding: -1px -1px; height: 20px; background-color: #2A3F54">
  <div class="pull-right" style="padding-bottom: 0.13%">
   Alpin Aprianto Saputra
</div>
<div class="clearfix"></div>
</footer>
<!-- jQuery -->
<script src="{!! asset('../template/vendors/jquery/dist/jquery.min.js') !!}"></script>
<!-- Bootstrap -->
<script src="{!! asset('../template/vendors/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
<!-- NProgress -->
<script src="{!! asset('../template/vendors/nprogress/nprogress.js') !!}"></script>
<!-- bootstrap-progressbar -->
<script src="{!! asset('../template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}"></script>
<!-- iCheck -->
<script src="{!! asset('../template/vendors/iCheck/icheck.min.js') !!}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{!! asset('../template/vendors/moment/min/moment.min.js') !!}"></script>
<script src="{!! asset('../template/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script >
$(document). ready(function() {
    $('#tabelKota').DataTable();
    $('#tabelInfrastruktur').DataTable();
    $('#tabelInvestasi').DataTable();
    $('#tabelPariwisata').DataTable();
    $('#tabelPelayananPublik').DataTable();
    $('#tabel').DataTable();
});
</script>

<!-- Custom Theme Scripts -->
<script src="{!! asset('../template/build/js/custom.min.js') !!}"></script>
</body>
</html>