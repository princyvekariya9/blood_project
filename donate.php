<?php
include_once 'header.php';
$con = mysqli_connect("localhost", "root", "", "blood");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donorName = $_POST['donorName'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNumber = $_POST['contactNumber'];
    $email = $_POST['email'];
    $bloodType = $_POST['bloodType'];
    $age = $_POST['age'];

    // Check if the image file is set and is valid
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $path = "img/donate_img/" . $image;

        // Move the uploaded file to the specified path
        if (move_uploaded_file($image_tmp, $path)) {
            // Prepare the statement to insert donation details
            $stmt = $con->prepare("INSERT INTO donations (donor_name, dob, gender, contact_number, email, blood_type, age, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if (!$stmt) {
                die("Prepare failed: " . $con->error);
            }

            // Bind parameters
            $stmt->bind_param("sssssiss", $donorName, $dob, $gender, $contactNumber, $email, $bloodType, $age, $image);

            // Execute the statement
            

            $stmt->close();
        } 
    } 
}

$con->close();
?>

<!-- Your existing HTML form code here -->
<!-- Make sure the form includes enctype="multipart/form-data" -->


<!-- Your existing HTML form code here -->


<!-- breadcrumb start -->
<div class="breadcrumb_section overflow-hidden ptb-150">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
        <h2>Donate Now</h2>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="active">Donate Now</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb end -->

<!-- donate form start -->
<div class="gray_bg ptb-120">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-11 col-12">
        <div class="website__title text-center">
          <h2 class="mb-5">Make a Donation</h2>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
    </div>
    <div class="row justify-content-center ">
      <div class="col-xl-8 col-lg-8 col-md-11 col-12">
        <div class="km__donate__form">
          <h6 class="mb-30">Details</h6>
          <div class="km__form__donat">
            <form action="" method="POST" enctype="multipart/form-data"> <!-- Added enctype -->
              <div class="row g-4">
                <div class="col-12 col-sm-6">
                  <input type="text" id="donorName" name="donorName" placeholder="John Doe" required>
                </div>
                <div class="col-12 col-sm-6">
                  <input type="date" id="dob" name="dob" required>
                </div>
              </div>
              <div class="row g-4">
                <div class="col-12 col-sm-6">
                  <select id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
                <div class="col-12 col-sm-6">
                  <input type="tel" id="contactNumber" name="contactNumber" placeholder="+1 (123) 456-7890" required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="email" id="email" name="email" placeholder="example@example.com" required>
                </div>
                <div class="col">
                  <input type="number" id="age" name="age" placeholder="enter age" required> <!-- Changed input type to number -->
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="file" id="image" name="image" required> <!-- Corrected name to "image" -->
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <select id="bloodType" name="bloodType" required>
                    <option value="" disabled selected>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="primary__btn border-0 ">Donate Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- donate form end -->
<!-- footer section start -->
<?php
include_once 'footer.php';
?>
