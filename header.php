<?php
session_start(); // Ensure this is at the top of the script

$con = mysqli_connect("localhost", "root", "", "blood");

// Initialize the $msg variable
// $msg = "";

// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     // Prepare the SQL query to avoid SQL injection
//     $stmt = $con->prepare("SELECT * FROM user_ragister WHERE email = ? AND password = ?");
//     $stmt->bind_param("ss", $email, $password);
//     $stmt->execute();
//     $res = $stmt->get_result();
    
//     // Check the number of rows returned
//     if ($res->num_rows == 1) {
//         $data = $res->fetch_assoc();
//         $_SESSION['userid'] = $data['id'];
//         $_SESSION['user_email'] = $email;
//         // Redirect to the dashboard or another page
//         header('Location: dashboard.php');
//         exit();
//     } else {
//         $msg = "Email and password do not match!";
//     }

//     $stmt->close();
//     $con->close();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required Meta Tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Page Title -->
  <title>Blad Cloud - Blood Donation</title>

  <!-- Favicon Icon -->
  <link rel="shortcut icon" href="assets/images/favicon.php">

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/slick.css">
  <link rel="stylesheet" href="assets/css/fancybox.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
</head>

<body>
  <!-- scroll to top -->
  <div class="progress-wrap cursor-pointer active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
        style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 221.377;">
      </path>
    </svg>
  </div>
  <!-- scroll to top -->

  <!-- header start -->
  <header>
    <div class="header_bottom">
      <div class="container">
        <div class="row align-items-center  position-relative">
          <div class="col-xl-2 col-lg-2 col-md-4 col-6">
            <div class="header_logo">
              <a href="index.php"><img src="assets/images/main_logo.png" alt="images not found" class="img-fluid"></a>
            </div>
          </div>
          <div class="col-xl-10 col-lg-10 d-none d-xxl-block d-xl-block">
            <ul class="main_menu align-items-center ">
              <li class="position-relative">
                <a href="index.php">Home </a>
              </li>
              <li><a href="about.php">About Us</a></li>
              <li class="position-relative">
                <a href="javascript:void(0)">Campaign <i class="fa-solid fa-angle-down"></i></a>
                <ul class="submenu_wrapper">
                  <li><a href="campaign.php">Campaign </a></li>
                  <li><a href="campaign-details.php">Campaign Details</a></li>
                </ul>
              </li>
              <li class="position-relative">
                <a href="javascript:void(0)">Pages <i class="fa-solid fa-angle-down"></i></a>
                <ul class="submenu_wrapper">
                  <li><a href="photo-gallary.php">Photo Gallery</a></li>
                  <li><a href="donate.php">Donate</a></li>
                  <li><a href="register.php">Register</a></li>
                </ul>
              </li> 
              <li><a href="contact.php">Contact</a></li>
              <li><a href="#">
                <button class="btn p-0 login_btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
              </a></li>
            </ul>
          </div>
          
          <!-- mobile menu bar -->
          <div class="col-lg-10 col-md-8 col-6 d-block d-xxl-none d-xl-none">
            <div class="d-flex align-items-center gap-2 justify-content-end">
              <div class="dropdown dropdown_search">
                <button class="search-btn" data-bs-toggle="dropdown" aria-expanded="true"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                  <form class="search-form d-flex align-items-center gap-2">
                    <input type="text" placeholder="Search..." class="theme-input bg-transparent">
                    <button type="submit" class="submit-btn">Go</button>
                  </form>
                </div>
              </div>
              <div class="mobile_menu">
                <button class="header_toggle_btn bg-transparent border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-mobile">
                  <span></span>
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- login register modal start -->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-danger" id="exampleModalToggleLabel">Login to Blood Cloud</h1>
          <button type="button" class="btn-close text-danger d-flex align-items-center justify-content-center" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form method="post">
          <div class="modal-body">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
            </div>
            <div class="mb-3">
              <input type="submit" value="Submit" name="submit" class="btn p-0 login_btn">
            </div>
           
          </div>
        </form>
        <div class="modal-footer text-center">
          <span>Don't Have an Account? </span>
          <a href="register.php" class="fw-semibold text-danger register_link">Register</a>
        </div>
      </div>
    </div>
  </div>
  <!-- login register modal end -->
</body>
</html>
