<?php 
ob_start();
$con= mysqli_connect("localhost","root","","blood");
ob_start();
session_start(); 
  if(!isset($_SESSION['userid'])) 
  { 
    header("location:index.php");
  } 

$id=$_SESSION['userid'];
$sql="select * from admin where id=".$id;
$id=$_SESSION['userid'];
$res=mysqli_query($con,$sql);
$data= mysqli_fetch_assoc($res);


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blood Cloud / Admin Panel </title>

  <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/all.min.css">
</head>
<script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</script>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">logout</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="currentpass.php" class="nav-link">change password</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
    
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
  
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
     <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link pb-3">
      <img src="image/admin_img/<?php echo $data['image']; ?>" alt="AdminLTE Logo" class="brand-image  elevation-3">
      <span class="brand-text font-weight-light ms-3"><?php echo $data['name']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-4">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Admin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon "></i>
                  <p>add admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view admin</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- blood -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Blood
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_blood.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add blood</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_blood.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view blood</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- location -->
           
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="slider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_slider.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view slider</p>
                </a>
              </li>
            </ul>
          </li>
         
          <li class="nav-item">
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Camp Details 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="campe.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add camp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_campe.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view camp</p>
                </a>
              </li>
            </ul>
          </li>
    
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                News Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="news.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add news</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_news.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view news</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Gallery 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="gallry.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add gallery</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_gallery.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view gallery</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Information Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="information.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_information.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view information</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
               All Services
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="service.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add service</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_service.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view service</p>
                </a>
              </li>
            </ul>
          </li>
          <!--  -->
          <!-- our client -->
            <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Our Client
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ourclient.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add client</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_client.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view client</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                  FAQ
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="faq.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>add faq</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view_faq.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view faq</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                contact
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="contact.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>view contact</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>