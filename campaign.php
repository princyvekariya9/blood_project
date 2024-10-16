<?php
include_once 'header.php';
$con= mysqli_connect("localhost","root","","blood");

$sql= "select * from campe";
$res= mysqli_query($con,$sql);
?>

  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>Campaings</h2>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active">Campaigns</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- campaigns section start -->
  <section class="km__campaigns ptb-115">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="common_title text-center">
            <p>Donate Now</p>
            <h2>Popular Campaigns</h2>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <?php 
        while($data=mysqli_fetch_assoc($res)){
         ?>
         <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4">
          <div class="km__blog position-relative">
            <div class="feature-image img mb-30">
              <a href="campaign-details.php">
                <img class="w-100" src="admin/image/campe_img/<?php echo $data['image']?>" alt="images not found" />
              </a>
              <span class=" d-flex justify-content-center align-items-center">
              </span>
            </div>
            <div class="km__post__content">
              <a href="campaign-details.php">
                <h4 class="mb-3"><?php echo $data['title'] ?></h4>
              </a>
              <p class="mb-30">
                <?php echo $data['description']?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
        
      </div>
    </div>
  </section>
  <!-- campaigns section ends -->

  <!-- lets change start -->
  <section class="change red_bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-9 col-lg-9 col-12">
          <div class="change_content">
            <h2>Let's change the world, Join us now!</h2>
          </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-12 text-xl-end text-lg-end text-center">
          <a href="contact.php">Contact Us</a>
        </div>
      </div>
    </div>
  </section>
  <!-- lets change end -->


  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>