<?php
include_once 'header.php';

// Create connection
$con = new mysqli("localhost", "root", "", "blood");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_POST['Submit'])) {
    // Prepare an SQL statement
    $stmt = $con->prepare("INSERT INTO reviews (name, email, comment) VALUES (?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($con->error));
    }

    // Bind parameters
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];
    $stmt->bind_param("sss", $name, $email, $comment);
    
    // Execute statement
    if ($stmt->execute()) {
        echo "<p></p>";
    } else {
        echo "<p>Registration failed: " . htmlspecialchars($stmt->error) . "</p>";
    }
    
    // Close statement
    $stmt->close();
}

// Fetch reviews
$sql1 = "SELECT * FROM `reviews` ORDER BY `reviews`.`id` DESC limit 3";
$res1 = $con->query($sql1);

if ($res1 === false) {
    die("Query failed: " . htmlspecialchars($con->error));
}

$con->close();
?>

<!-- breadcrumb start -->
<div class="breadcrumb_section overflow-hidden ptb-150">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
        <h2>Blog details fullwidth</h2>
        <ul>
          <li><a href="index-2.php">Home</a></li>
          <li class="active">Blog details fullwidth</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumb end -->

<!-- section blog details start -->
<section class="km__blog__details ptb-120">
  <div class="container">
    <div class="blog__img mb-30">
      <img src="assets/images/blog/b-bg.jpg" alt="images not found" class="img-fluid">
    </div>
    <!-- Blog content here -->

    <!-- Comments Section -->
    <div class="km__comments__Sectios mt-60">
      <div class="km__comment__heading">
        <h4 class="mb-30">3 Comments</h4>
      </div>
      <?php 
        if ($res1->num_rows > 0) {
            while ($data = $res1->fetch_assoc()) {
                echo "<div>";
                echo "<strong>" . htmlspecialchars($data['name']) . "</strong><br>";
                echo "<em>" . htmlspecialchars($data['email']) . "</em><br>";
                echo "<p>" . htmlspecialchars($data['comment']) . "</p>";
                echo "</div><hr>";
            }
        } else {
            echo "<p>No comments yet.</p>";
        }
      ?>
      <section id="commentsSection" class="comments"></section>

      <!-- Show More Button -->
      <button id="showMoreBtn" class="border-0 mt-3" style="display:none;">
        Show More
      </button>
      <div class="km__write__your__comments mt-60">
        <div class="write__comment__heading">
          <h4 class="mb-40">Leave A Reply</h4>
        </div>
        <div class="write__comment__form">
          <form id="commentForm" method="post">
            <div class="row">
              <div class="col-12 col-sm-6">
                <input type="text" id="name" placeholder="Name" name="name" required>
              </div>
              <div class="col-12 col-sm-6">
                <input type="email" id="email" placeholder="Email" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <textarea id="comment" rows="5" name="comment" placeholder="Write your comments" required></textarea>
              </div>
            </div>
            <button type="submit" name="Submit" class="primary__btn border-0">
              Post Comment
              <span class="ms-2 d-inline-block">
                <i class="fas fa-arrow-right"></i>
              </span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- section blog details ends -->

<!-- footer section start -->
<?php
include_once 'footer.php';
?>
