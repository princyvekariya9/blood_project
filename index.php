<?php
$con = mysqli_connect("localhost" , "root" , "" , "blood");
include_once 'header.php';

$sql= "SELECT * FROM slider where status=1";
$res = mysqli_query($con,$sql);

$sql= "SELECT * FROM news LIMIT 3";
$res1 = mysqli_query($con,$sql);

$sql= "SELECT * FROM campe ";
$result = mysqli_query($con,$sql);

$sql= "SELECT * FROM information LIMIT 3";
$resin = mysqli_query($con,$sql);

$sql="select * from service";
$service= mysqli_query($con,$sql);

$sql="select * from our_client";
$client= mysqli_query($con,$sql);




?>


<!-- ----------- slider start -------- -->

<section class="hm1_hero_slider">
<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false" data-bs-interval="2000">
    <div class="carousel-inner">
      <?php 
      while($data= mysqli_fetch_assoc($res)){
      ?>
      <div class="hm1_content position-relative carousel-item active">
        <img src="admin/image/slider_img/<?php echo $data['image']?>" alt="" class="img-fluid">
        <div class="slider_contain position-absolute ">
          <h3><?php echo $data['title']?></h3>
          <h1><?php echo $data['description'] ?></h1>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>


<!-- ----------- slider end -------- -->


<!-- register & donate start -->
<section class="register_donate ptb-115 gray">
  <div class="container">
    <div class="row g-0 register_top">
      <div class="col-xl-6 col-lg-6 col-12">
        <div class="register red_bg">
          <div class="register_content">
            <h4>Become a Lifesaver—Register Now!</h4>
            <p>Register now to join our life-saving community, connecting you with patients in need. Your quick signup could save lives and prevent blood shortages—be a hero today!
            </p>
          </div>
          <div class="register_icon black_hover">
            <a href="register.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6  col-12">
        <div class="register black_bg">
          <div class="register_content">
            <h4>Donate Now—Save Lives Today!</h4>
            <p>Donating blood is quick, safe, and life-saving. Help prevent blood shortages and give someone a second chance. Donate today!
            </p>
          </div>
          <div class="register_icon red_hover">
            <a href="donate.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <?php
      while($data= mysqli_fetch_assoc($resin)){
      ?>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
        <div class="register_donate_item">
          <div class="donate_item_top">
            <div class="donate_img">
              <img src="admin/image/information_img/<?php echo $data['image']?>" alt="">
            </div>
            <div class="donate_content text-center">
              <span><img src="assets/images/icon/d1.png" alt=""></span>
              <a href="#">
                <h5><?php echo $data['title']?></h5>
              </a>
              <p><?php echo $data['description']?></p>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
      
    </div>
  </div>
</section>
<!-- register & donate end -->

<!-- help the people start -->
<section class="help_people ptb-115 overflow-hidden">
  <div class="container">
    <div class="row align-items-center g-lg-5 g-xl-5 g-xxl-5">
      <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
        <div class="help_wrap position-relative">
          <img src="assets/images/help1.png" alt="">
          <img src="assets/images/help2.png" alt="" class="help_over">
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-12">
        <div class="help_content">
          <p class="red_color">Help The People in Need</p>
          <h2>Welcome to the Blood Donors Organization!</h2>
          <p>Our mission is to save lives by ensuring a steady and reliable supply of blood through dedicated donors. Your support is crucial in making sure that patients in need receive the blood they require.</p>
          <div class="d-flex justify-content-between">
            <ul>
              <li><i class="fa-solid fa-angles-right"></i> Save Lives</li>
              <li><i class="fa-solid fa-angles-right"></i> Community Support</li>
              <li><i class="fa-solid fa-angles-right"></i> Health Benefits</li>
            </ul>
            <ul>
              <li><i class="fa-solid fa-angles-right"></i> 24h Service</li>
              <li><i class="fa-solid fa-angles-right"></i> Health Check</li>
              <li><i class="fa-solid fa-angles-right"></i> Easy Process</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- help the people end -->

<!-- counter start -->
<section class="hm1_counter">
  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
        <div class="counter_item text-center">
          <img src="assets/images/icon/c1.png" alt="">
          <h2><span class="count">25</span></h2>
          <p>Year experience</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
        <div class="counter_item text-center">
          <img src="assets/images/icon/c2.png" alt="">
          <h2><span class="count">3225</span></h2>
          <p>happy donors</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
        <div class="counter_item text-center">
          <img src="assets/images/icon/c3.png" alt="">
          <h2><span class="count">90</span></h2>
          <p>total awards</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="counter_item text-center">
          <img src="assets/images/icon/c4.png" alt="">
          <h2><span class="count">3168</span></h2>
          <p>happy recipient</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- counter end -->

<!-- service start -->
<section class="service ptb-115">
  <div class="container">
    <div class="row mb-5 ">
      <div class="col-12">
        <div class="common_title text-center">
          <p>What We do</p>
          <h2>our best services</h2>
        </div>
      </div>
    </div>
         <div class="testi_slider slider-spacing">
        <?php 
        while($data= mysqli_fetch_assoc($service)){
         ?>
          <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <h3 style="color: #d60033;"><?php echo $data['service']?></h3>
            </div>
            <p><?php echo $data['description']?></p>
          </div>
          
        </div>
        <?php }?>
        </div>
      </div>

      
<!-- service end -->

<!-- call now start -->
<section class="hm1_counter call_now">
  <div class="container">
    <div class="row">
      <div class="col-12 ">
        <div class="call_content text-center">
          <span class="call_over"><i class="fa-solid fa-phone"></i></span>
          <p>START DONATING</p>
          <a href="tel:+7048531207">
            <h2>Call Now: <span>70485 31207</span></h2>
          </a>
          <ul class="d-flex gap-4 justify-content-center flex-wrap">
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

<!-- campaign start -->
<section class="campaign gray ptb-115">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="common_title text-center">
          <p>Donate Now</p>
          <!-- <h2>Popular Campaigns</h2> -->
          <h2>Pulse of Life Campaign</h2>
        </div>
      </div>

      <div class="campaign_slider slider-spacing  ">
        <?php 
        while($data= mysqli_fetch_assoc($result)){
         ?>
         <div class="campaign_slier_item">
          <div class="row g-0">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 col-5 ">
              <div class="campaign_img">
                <img src="admin/image/campe_img/<?php echo $data['image'] ;?>" alt="">
                <a href="campaign-details.php">Read More</a>
              </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
              <div class="campaign_content">
                <div class="meta_date">
                  <span><i class="fa-regular fa-calendar-days me-2"></i><?php echo $data['date'] ;?></span>
                </div>
                <a href="campaign-details.php">
                  <h6><?php echo $data['title'] ;?></h6>
                </a>
                <p class="three-line-ellipsis"><?php echo $data['description'] ;?></p>
                <div class="meta_time d-flex gap-4">
                  <span><i class="fa-regular fa-clock"></i><?php echo $data['time'] ;?></span>
                  <span><i class="fa-solid fa-location-dot"></i><?php echo $data['location'] ;?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
        
      </div>

    </div>
  </div>
</section>
<!-- campaign end -->


<!-- testimonial start -->
<section class="testimonial ptb-115">
  <div class="container">
    <div class="row ">
      <div class="col-12 mb-5">
        <div class="common_title text-center">
          <p>testimonial</p>
          <h2>What Our Clients Say</h2>
        </div>
      </div>

      <div class="testi_slider slider-spacing">
        <?php 
        while($data= mysqli_fetch_assoc($client)){
         ?>
        
        <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
            </div>
            <p><?php echo $data['description'] ?></p>
          </div>
          <div class="testi_owner d-flex gap-4 align-items-center">
            <div class="testi_img img">
              <a href="#"><img src="admin/image/curclient_img/<?php echo $data['image'] ;?>" alt=""></a>
            </div>
            <div class="testi_name">
              <h5><?php echo $data['name'] ?></h5>
              <p><?php echo $data['role'] ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
        
        
        
      </div> 
    </div>
  </div>
</section>
<!-- testimonial end -->

<!-- blood doner start -->
<section class="blood ptb-115">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="common_title1 text-center">
          <p>blood owner</p>
          <h2>We Are Blood Donor Group</h2>
          <div class="blood_play position-relative">
            <a href="https://youtu.be/K87aFjB7Ff0?si=kpgANQNewn8DSOtq" data-fancybox=""
              class="red_bg d-inline-flex align-items-center justify-content-center"><i
                class="fa-solid fa-play"></i></a>
            <img src="assets/images/b1.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--our news start -->
<section class="news gray ptb-115 ">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12">
        <div class="common_title text-center">
          <p>our news</p>
          <h2>Checkout News & Updates</h2>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <?php 
      while($data = mysqli_fetch_assoc($res1)){
       ?>
       <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mb-xl-0 mb-lg-0">
        <div class="news_content_item">
          <div class="news_img ">
            <img src="admin/image/news_img/<?php echo $data['image']; ?>" alt="">
            <a href="blog-details.php"><i class="fa-solid fa-plus"></i></a>
          </div>
          <div class="news_content">
            <!-- <div class="meta d-flex gap-4">
              <span><i class="fa-regular fa-clock"></i> 18 Feb, 2022</span>
              <span><i class="fa-solid fa-comments"></i> 3 Comments</span>
            </div> -->
            <a href="blog-details.php">
              <h5 class="one-line-ellipsis"><?php echo $data['title'] ?></h5>
            </a>
            <p class="three-line-ellipsis"><?php echo $data['description'] ?></p>
            <a href="blog-details.php">Read More <i class="fa-solid fa-angles-right"></i></a>
          </div>
        </div>
      </div>
    <?php } ?>

    </div>
  </div>
</section>
<!--our news end -->

<!-- lets change start -->
<section class="change red_bg">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-9 col-lg-9  col-12">
        <div class="change_content">
          <h2>Let's change the world, Join us now!</h2>
          <p>Be a Lifesaver Today!
          Every drop of blood you donate can be a step toward changing the world for someone in need. Together, we can create a healthier, safer future—one donation at a time.</p>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3  col-12 text-xl-end text-lg-end text-center">
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
