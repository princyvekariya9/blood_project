<?php
ob_start(); // Start output buffering
session_start(); // Make sure to start the session
include 'header.php';
$con = mysqli_connect("localhost", "root", "", "blood");

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $stmt = $con->prepare("SELECT * FROM user_ragister WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $res = $stmt->get_result();
    
    if ($res->num_rows == 1) {
        $data = $res->fetch_assoc();
        $_SESSION['userid'] = $data['id'];
        $_SESSION['user_email'] = $email;
        header('Location: donate.php');
        exit();
    } else {
        echo "Email and password do not match!";
    }

    $stmt->close();
    $con->close();
}
?>

<style>
    .km__form__box {
        background: #fff; /* Background color */
        padding: 30px; /* Padding around the form */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }
    .main_loginbox {
        max-width: 400px; /* Set a max width */
        margin: auto; /* Center the box */
        border: 1px solid #dc3545; /* Border color matching button */
        border-radius: 10px; /* Rounded corners for the box */
        padding: 20px;
        margin: 100px auto;
    }
    .main_loginbox h2{
  font-size: 30px;
  color:var(--primary-color);
}
    .login_btn {
        background-color: #dc3545; /* Custom color for the button */
        color: white; /* Text color */
        width: 100%; /* Full-width button */
    }
    .register_link {
        text-decoration: underline; /* Underline for the link */
    }
</style>

 <!-- breadcrumb start -->
 <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>Login</h2>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active">Login</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

<div class="main_loginbox">
    <h2 class="text-center mb-4">Login to  Blood Bank</h2>
    <form method="post">
        <div class="">
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <div class="mb-3">
                <input type="submit" value="Login" name="submit" class="btn login_btn">
            </div>
        </div>
        <div class="modal-footer text-center">
            <span>Don't Have an Account? </span>
            <a href="register.php" class="fw-semibold text-danger register_link">Register</a>
        </div>
    </form>
</div>

<?php
include 'footer.php';
ob_end_flush(); // Flush the output buffer
?>
