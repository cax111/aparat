<!DOCTYPE html>
<html>
<head>
  <?php
    include "class/koneksi.php";
    include "class/class-user.php";
    include "class/class-pagu.php";
    include "class/class-pengaturan.php";
    include "class/class-barang.php";
    include "class/surat_kontrak/class-surat_kontrak.php";
    include "class/surat_kontrak/class-surat_oe.php";
    include "class/surat_kontrak/class-surat_pph.php";
    include "class/surat_kontrak/class-surat_bappsph.php";
    include "class/surat_kontrak/class-surat_bapph.php";
    include "class/surat_kontrak/class-surat_ppsph.php";
    include "class/surat_kontrak/class-surat_uknh.php";
    include "class/surat_kontrak/class-surat_baknh.php";
    include "class/surat_kontrak/class-surat_bahpl.php";
    include "class/surat_kontrak/class-surat_pp.php";
    include "class/surat_kontrak/class-surat_bapp.php";
    include "class/surat_kontrak/class-surat_spk.php";
    include "class/surat_kontrak/class-surat_sp.php";
    include "class/surat_kontrak/class-surat_bapb.php";
    include "class/surat_kontrak/class-surat_bastb.php";
    include "class/surat_kontrak/class-surat_bap.php";
    include "class/surat_pt/class-surat_pt.php";
    include "class/surat_pagu/class-surat_penawaran.php";
    include "class/surat_pagu/class-surat_spk.php";

    $user = new kelolaUser;
    $pagu = new kelolaPagu;
    $pengaturan = new pengaturan;
    $barang = new barang;
  //surat kontrak
    $surat_kontrak = new kelolaSuratKontrak;
    $surat_oe = new kelolaSuratOE;
    $surat_pph = new kelolaSuratPPH;
    $surat_bappsph = new kelolaSuratBAPPSPH;
    $surat_bapph = new kelolaSuratBAPPH;
    $surat_ppsph = new kelolaSuratPPSPH;
    $surat_uknh = new kelolaSuratUKNH;
    $surat_baknh = new kelolaSuratBAKNH;
    $surat_bahpl = new kelolaSuratBAHPL;
    $surat_pp = new kelolaSuratPP;
    $surat_bapp = new kelolaSuratBAPP;
    $surat_sspk = new kelolaSuratSPK;
    $surat_sp = new kelolaSuratSP;
    $surat_bapb = new kelolaSuratBAPB;
    $surat_bastb = new kelolaSuratBASTB;
    $surat_bap = new kelolaSuratBAP;
  //end surat kontrak
  //surat pt (Perusahaan)
    $surat_pt = new kelolaSuratPT;
  //end surat pt
  //surat pagu
    $surat_penawaran  = new penawaran;
    $surat_spk = new spk;
    //memulai session
    ob_start();
    session_start();
    //cek ketersediaan session
    if(empty($_SESSION['id_user_aparat'])){
      //jika ada maka halaman diterukan ke index.php/halaman utama
      header('location:modul/login/login.php');
    }
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aparat | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>APA</b>RAT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
            $tampil = $user->tampilUser("WHERE id_user='$_SESSION[id_user_aparat]'");
            foreach($tampil AS $t){
          ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $t['nama_user'] ?> | Direktur <?= $t['nama_perusahaan'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?=$t['nama_user'];?>
                  <br/>
                  <small>Direktur <?=$t['nama_perusahaan']?>
                  <br/>
                  <?= $t['alamat_perusahaan'] ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="index.php?page_pengguna=profil-pengguna" class="btn btn-default btn-flat">Profil Pengguna</a>
                </div>
                <div class="pull-right">
                  <a href="modul/login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $t['nama_user'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php
        }
        //tutup dari foreach $tampil
      ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Semua Surat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
             <li><a href="index.php?page=surat_kontrak" ><i class="fa fa-circle-o"></i> Lihat Data Surat Kontrak</a></li>
             <li><a href="index.php?page=surat_pt" ><i class="fa fa-circle-o"></i> Lihat Data Surat Perusahaan</a></li>
             <li><a href="index.php?page=surat_lain" ><i class="fa fa-circle-o"></i> Lihat Data Surat Lain-lain</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Buat Perhitungan Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li ><a href="index.php?page_perhitungan=surat_pagu"><i class="fa fa-circle-o"></i>HPS</a></li>
              <li ><a href="index.php?page_perhitungan=penawaran"><i class="fa fa-circle-o"></i>Penawaran</a></li>

              <li ><a href="index.php?page_perhitungan=spk"><i class="fa fa-circle-o"></i>SPK</a></li>

          </ul>
        </li>
        <li>
          <a href="index.php?page_pengguna=profil-pengguna">
            <i class="fa fa-edit"></i> <span>Profil Pengguna</span>
          </a>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
            <?php
              if(isset($_GET['pageParent'])&&isset($_GET['page'])&&isset($_GET['act'])){
                $pageParent = $_GET['pageParent'];
                $page = $_GET['page'];
                $act = $_GET['act'];
                include "modul/surat/$pageParent/$page/$act".".php";
              }elseif(isset($_GET['page'])&&isset($_GET['act'])){
                $page = $_GET['page'];
                $act = $_GET['act'];
                include "modul/surat/$page/$act".".php";
              }else if(isset($_GET['page_perhitungan'])&&isset($_GET['act'])){
                $page_perhitungan = $_GET['page_perhitungan'];
                $act = $_GET['act'];
                include "modul/perhitungan/$act".".php";
              }else if(isset($_GET['page_pengguna'])&&isset($_GET['act'])){
                $page_pengguna = $_GET['page_pengguna'];
                $act = $_GET['act'];
                include "modul/$page_pengguna/$act".".php";
              }else if(isset($_GET['page'])){
                $page = $_GET['page'];
                include "modul/surat/$page/$page".".php";
              }else if(isset($_GET['page_perhitungan'])){
                $page_perhitungan = $_GET['page_perhitungan'];
                include "modul/perhitungan/$page_perhitungan".".php";
              }else if(isset($_GET['page_pengguna'])){
                $page_pengguna = $_GET['page_pengguna'];
                include "modul/profil-pengguna/$page_pengguna".".php";
              }else{
                include 'modul/index/halaman-awal.php';
              }
            ?>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- <section class="col-lg-3 connectedSortable">
          <h2>Surat Dibuat</h2>
          <div  class="box box-success">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Kebutuhan Surat</h3>

            </div>
        </section> -->
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2018 <a href="">CWDStudio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
