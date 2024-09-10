<?php
include_once 'header.php';
$con =mysqli_connect("localhost","root","","blood");
$sql ="select * from information";
$res=mysqli_query($con,$sql);
?>

  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>About Us</h2>
          <ul>
            <li><a href="index-2.php">Home</a></li>
            <li class="active">About Us</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- wellcome section start -->
  <section class="km__Who__section ptb-120">
    <div class="container">
      <div class="row align-items-center g-0 g-xxl-5 g-xl-5 g-lg-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="km__who__content">
            <h2 class="mb-30">Who We Are</h2>
            <p class="mb-30">We are dedicated to improving healthcare through efficient blood bank management. Our team focuses on ensuring a steady and safe supply of blood through our comprehensive management system, designed to streamline donation, storage, and distribution processes.
            </p>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="km__who__imgbx img">
            <img src="assets/images/about/doctor.jpg" alt="images not found" class="img-fluid" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- wellcome section ends -->

  <!-- counter start -->
  <div class="km__counterup___section">
    <div class="container">
      <div class="row g-4 justify-content-center">
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
          <ul class="km__counterup___box text-center">
            <li class="h1 counter mb-30"><span class="count">25</span></li>
            <li class="counter__content">Years of Experience</li>
          </ul>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
          <ul class="km__counterup___box text-center">
            <li class="h1 counter mb-30"><span class="count">430</span></li>
            <li class="counter__content">Blood Donations</li>
          </ul>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
          <ul class="km__counterup___box text-center">
            <li class="h1 counter mb-30"><span class="count">90</span></li>
            <li class="counter__content">Total Awards</li>
          </ul>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
          <ul class="km__counterup___box text-center">
            <li class="h1 counter mb-30"><span class="count">35</span></li>
            <li class="counter__content">Blood Cooperations</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- counter end -->

  <!-- help the people start -->
  <section class="help_people ptb-115">
    <div class="container">
      <div class="row align-items-center g-lg-5 g-xl-5 g-xxl-5">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-5 mb-xl-0 mb-lg-0 mb-md-0">
          <div class="help_wrap position-relative">
            <img src="assets/images/a2.png" class="help_3" alt="" />
            <img src="assets/images/a2.jpg" class="help_4" alt="" />
            <img src="assets/images/help2.png" alt="" class="help_over" />
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-12">
          <div class="help_content">
            <p class="red_color">Help The People in Need</p>
            <h2>Welcome to Blood Donors Organization</h2>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
              eiusmod tempor incididunt ut labore et dolore magna aliqua.
              suspendisse the gravida. Risus commodo viverra maecenas
            </p>
            <div class="d-flex justify-content-between">
              <ul>
                <li><i class="fa-solid fa-angles-right"></i> Good Service</li>
                <li><i class="fa-solid fa-angles-right"></i> Help People</li>
                <li><i class="fa-solid fa-angles-right"></i> Hugine Tools</li>
              </ul>
              <ul>
                <li><i class="fa-solid fa-angles-right"></i> 24h Service</li>
                <li><i class="fa-solid fa-angles-right"></i> Health Check</li>
                <li><i class="fa-solid fa-angles-right"></i> Blood Bank</li>
              </ul>
            </div>
            <a href="about.php" class="explore_now red_btn">Explore Now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- help the people end -->

  <!-- campaigns section start -->
  <section class="km__campaigns ptb-115">
    <div class="container">
      <div class="row mb-5 ">
        <div class="col-12">
          <div class="common_title text-center">
            <p>Donate Now</p>
            <h2>information </h2>
          </div>
        </div>
      </div>
      <div class="testi_slider slider-spacing">
        <?php 
        while($data= mysqli_fetch_assoc($res)){
         ?>
          <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <h3><?php echo $data['title']?></h3>
            </div>
            <p><?php echo $data['description']?></p>
            <div>
            <img src="admin/image/information_img/<?php echo $data['image']?>" style="height: 100px; width: 100px; border-radius: 50%; padding-top: 10px;">
          </div>
          </div>
          
          
        </div>
        <?php }?>
        </div>
      
    </div>
  </section>
  <!-- campaigns section ends -->

  <!-- Testimonials section start -->
  
  <!-- Testimonials section ends -->

  <!-- call now start -->
  <section class="hm1_counter call_now">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="call_content text-center">
            <span class="call_over"><i class="fa-solid fa-phone"></i></span>
            <p>START DONATING</p>
            <a href="tell:3335559090">
              <h2>Call Now: <span>333 555 9090</span></h2>
            </a>
            <ul class="d-flex gap-4 justify-content-center flex-wrap">
              <li>
                <span><i class="fa-solid fa-location-dot"></i></span>
                <span>New York - 1075 Firs Avenue</span>
              </li>
              <li>
                <span><i class="fa-solid fa-envelope"></i></span>
                <a href="mailto:company@domin.com">Donate@gmail.com</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- call now end -->

  <!-- what we do start -->
  <section class="whatdo ptb-115">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="common_title text-center">
            <p>what we do</p>
            <h2>Donation Process</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="what_progress">
            <ul>
              <img src="assets/images/p_line.png" class="progress_line" alt="" />
              <li>
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-7 col-sm-9 col-12">
                    <div class="progress_content d-flex align-items-center gap-xl-5 gap-lg-5 gap-md-4 gap-sm-3 gap-3">
                      <div class="p_content_left">
                        <h5>Registration</h5>
                        <p>
                          Nemo enim ipsam voluptatem quia voluptas sit
                          aspernatur aut odit aut fugit, sed quia consequuntur
                        </p>
                      </div>
                      <span class="progress_number">01</span>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row justify-content-end">
                  <div class="col-xl-6 col-lg-6 col-md-7 col-sm-9 col-12">
                    <div class="progress_content d-flex align-items-center gap-xl-5 gap-lg-5 gap-md-4 gap-sm-3 gap-3">
                      <span class="progress_number">02</span>
                      <div class="p_content_left p_content_right">
                        <h5>Screening Test</h5>
                        <p>
                          Nemo enim ipsam voluptatem quia voluptas sit
                          aspernatur aut odit aut fugit, sed quia consequuntur
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-7 col-sm-9 col-12">
                    <div class="progress_content d-flex align-items-center gap-xl-5 gap-lg-5 gap-md-4 gap-sm-3 gap-3">
                      <div class="p_content_left">
                        <h5>Donation</h5>
                        <p>
                          Nemo enim ipsam voluptatem quia voluptas sit
                          aspernatur aut odit aut fugit, sed quia consequuntur
                        </p>
                      </div>
                      <span class="progress_number">03</span>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="row justify-content-end">
                  <div class="col-xl-6 col-lg-6 col-md-7 col-sm-9 col-12">
                    <div class="progress_content d-flex align-items-center gap-xl-5 gap-lg-5 gap-md-4 gap-sm-3 gap-3">
                      <span class="progress_number">04</span>
                      <div class="p_content_left p_content_right">
                        <h5>Rest &amp; Refresh</h5>
                        <p>
                          Nemo enim ipsam voluptatem quia voluptas sit
                          aspernatur aut odit aut fugit, sed quia consequuntur
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- what we do end -->

  <!-- team start -->
 
  <!-- team end -->

  <!-- lets change start -->
  <section class="change red_bg">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-xl-9 col-lg-9 col-12">
          <div class="change_content">
            <h2>Let's change the world, Join us now!</h2>
            <p>
              Nor again is there anyone who loves or pursues or desires to
              obtain pain of itself, because it is pain, but occasionally
              circumstances occur in which toil and pain can procure reat
              pleasure.
            </p>
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