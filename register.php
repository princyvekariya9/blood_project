<?php
include_once 'header.php';

// Database connection
$con = mysqli_connect("localhost", "root", "", "blood");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    
    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Prepare an SQL statement
    $stmt = $con->prepare("INSERT INTO user_ragister (name, location, email, password) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($con->error));
    }
    
    $stmt->bind_param("ssss", $name, $location, $email, $hashed_password);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Include the email sending script
        include 'smtp.php';
        
        // Call the function to send email
        sendApprovalEmail($email, $name, "Your Registration");

        echo "<p>Registration successful! A confirmation email has been sent to your address.</p>";
    } else {
        echo "<p>Registration failed: " . htmlspecialchars($stmt->error) . "</p>";
    }
    
    $stmt->close();
    $con->close();
}
?>

<!-- HTML for the registration form -->
<div class="breadcrumb_section overflow-hidden ptb-150">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-8 col-md-8 col-sm-10 col-12 text-center">
        <h2>Register As a Blood Donor</h2>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="active"> Register Now</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb end -->

<!-- register box section start -->
<section class="km__register__box ptb-120">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2">
        <div class="text-center">
          <div class="km__website__title mb-30">
            <h2>Blood Cloud Organization</h2>
          </div>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-xl-8">
        <div class="km__form__box">
          <form method="post">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required>
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
            </div>
            <div class="row align-items-center g-4">
              <div class="col-md-5">
                <button type="submit" class="km__register__btn pt-3 pb-3 mt-3" name="submit">
                  Submit
                  <span><i class="fas fa-arrow-right"></i></span>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- register box section end -->

<!-- footer section start -->
<?php
include_once 'footer.php';
?>
