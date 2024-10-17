<?php
include_once 'header.php';
$con = mysqli_connect("localhost", "root", "", "blood");

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM contact WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $data1 = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message = mysqli_real_escape_string($con, $_POST['message']); // Fixed missing semicolon

    $sql= "insert into contact (name,last_name,email,message)values('$name','$last_name','$email','$message')";
    $query= mysqli_query($con,$sql);

    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blad Cloud</title>
    <!-- Essential CSS files -->
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/fancybox.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.php">
</head>
<body>
    <!-- Preloader start -->
    <!-- Preloader end -->

    <!-- Scroll to top -->
    <div class="progress-wrap cursor-pointer active-progress">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 221.377;">
            </path>
        </svg>
    </div>
    <!-- Scroll to top -->

    <!-- Breadcrumb start -->
    <div class="breadcrumb_section overflow-hidden ptb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb end -->

    <!-- Message box start -->
    <section class="km__message__box ptb-120">
        <div class="container">
            <div class="km__contact__form">
                <div class="row g-5">
                    <div class="col-xl-7">
                        <div class="km__box__form">
                            <h4 class="mb-40">Get In Touch</h4>
                            <p class="mb-30">Have questions or want to learn more about blood donations? Reach out to us for any inquiries, support, or information on how you can help save lives.
                            </p>
                            <form action="" method="post" class="km__main__form"> <!-- Added method and action -->
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="text" name="name" placeholder="First Name" value="<?php echo isset($data1['name']) ? htmlspecialchars($data1['name']) : ''; ?>"> <!-- Pre-fill data -->
                                    </div>
                                    <div class="col-sm">
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo isset($data1['last_name']) ? htmlspecialchars($data1['last_name']) : ''; ?>"> <!-- Pre-fill data -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <input type="email" name="email" placeholder="Email" value="<?php echo isset($data1['email']) ? htmlspecialchars($data1['email']) : ''; ?>"> <!-- Pre-fill data -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm">
                                        <textarea name="message" placeholder="Message" rows="3"><?php echo isset($data1['message']) ? htmlspecialchars($data1['message']) : ''; ?></textarea> <!-- Pre-fill data -->
                                    </div>
                                </div>
                                <button type="submit" name="submit" class="contact__btn">
                                    Submit Request
                                    <i class="fa-solid fa-angles-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="km__form__content">
                            <!-- Additional content can go here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Message box ends -->

    <!-- Footer section start -->
    <?php include_once 'footer.php'; ?>
</body>
</html>