<?php
$con = mysqli_connect("localhost" , "root" , "" , "blood");
include_once 'header.php';

$sql= "SELECT * FROM slider where status=1";
$res = mysqli_query($con,$sql);

$sql= "SELECT * FROM news LIMIT 3";
$res1 = mysqli_query($con,$sql);

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "insert into admin (name,email,password)values('$name','$email','$password')";
  mysqli_query($con, $sql);
  $_SESSION['user_email'] = $email;
  // header('location:smtp.php');

}

?>

<!-- ----------- slider start -------- -->

<section class="hm1_hero_slider">
<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-ride="carousel" data-bs-touch="false" data-bs-interval="3000">
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
            <h4>Register Now</h4>
            <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is
              pain,
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
            <h4>Donate Now</h4>
            <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is
              pain,
            </p>
          </div>
          <div class="register_icon red_hover">
            <a href="donate.php"><i class="fa-solid fa-arrow-right-to-bracket"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
        <div class="register_donate_item">
          <div class="donate_item_top">
            <div class="donate_img">
              <img src="assets/images/r1.jpg" alt="">
            </div>
            <div class="donate_content text-center">
              <span><img src="assets/images/icon/d1.png" alt=""></span>
              <a href="#">
                <h5>Become a donate</h5>
              </a>
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                born and I will give</p>
            </div>
          </div>
          <a href="blog-details.php" class="d-block black_bg text-center">Read More</a>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
        <div class="register_donate_item">
          <div class="donate_item_top">
            <div class="donate_img">
              <img src="assets/images/r2.jpg" alt="">
            </div>
            <div class="donate_content text-center">
              <span><img src="assets/images/icon/d2.png" alt=""></span>
              <a href="#">
                <h5>Why give blood?</h5>
              </a>
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                born and I will give</p>
            </div>
          </div>
          <a href="blog-details.php" class="d-block black_bg text-center">Read More</a>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="register_donate_item">
          <div class="donate_item_top">
            <div class="donate_img">
              <img src="assets/images/r3.jpg" alt="">
            </div>
            <div class="donate_content text-center">
              <span><img src="assets/images/icon/d3.png" alt=""></span>
              <a href="#">
                <h5>How Denations Help?</h5>
              </a>
              <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was
                born and I will give</p>
            </div>
          </div>
          <a href="blog-details.php" class="d-block black_bg text-center">Read More</a>
        </div>
      </div>
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
          <h2>Welcome to Blood
            Donors Organization</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
            suspendisse the gravida. Risus commodo viverra maecenas</p>
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
    <div class="row align-items-center g-0 service_wrap">
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 mb-5 order_1">
        <div class="service_item">
          <div class="img">
            <img src="assets/images/s1.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 mb-5 order_2">
        <div class="service_content ps-5">
          <h1>01</h1>
          <a href="#">
            <h4>Blood Donation</h4>
          </a>
          <p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Ut elit
            tellus, luctus nec ullamcorpe matti pulvinar dapibus leo.</p>
          <a href="service-details.php" class="red_btn service_btn">Read More</a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 mb-5 order_3">
        <div class="service_content text-end pe-5">
          <h1>02</h1>
          <a href="#">
            <h4>Health Check</h4>
          </a>
          <p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Ut elit
            tellus, luctus nec ullamcorpe matti pulvinar dapibus leo.</p>
          <a href="service-details.php" class="red_btn service_btn">Read More</a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 mb-5 order_4">
        <div class="service_item">
          <div class="img">
            <img src="assets/images/s2.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 mb-5 order_5">
        <div class="service_item">
          <div class="img">
            <img src="assets/images/s3.jpg" alt="">
          </div>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6  col-12 order_6">
        <div class="service_content ps-5">
          <h1>03</h1>
          <a href="#">
            <h4>Blood Bank</h4>
          </a>
          <p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur
            adipiscing elit. Ut elit
            tellus, luctus nec ullamcorpe matti pulvinar dapibus leo.</p>
          <a href="service-details.php" class="red_btn service_btn">Read More</a>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- service end -->

<!-- call now start -->
<section class="hm1_counter call_now">
  <div class="container">
    <div class="row">
      <div class="col-12 ">
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

<!-- campaign start -->
<section class="campaign gray ptb-115">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-5">
        <div class="common_title text-center">
          <p>Donate Now</p>
          <h2>Popular Campaigns</h2>
        </div>
      </div>

      <div class="campaign_slider slider-spacing  ">
        <div class="campaign_slier_item">
          <div class="row g-0">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 col-5">
              <div class="campaign_img">
                <img src="assets/images/c1.png" alt="">
                <a href="campaign-details.php">Read More</a>
              </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
              <div class="campaign_content">
                <div class="meta_date">
                  <span><i class="fa-regular fa-calendar-days"></i> 13 February, 2022</span>
                </div>
                <a href="campaign-details.php">
                  <h6>Free Group Checking</h6>
                </a>
                <p>Lorem ipsum dolor sit consectetur adipiscing elit, sed do incididunt et dolore magna aliqua.</p>
                <div class="meta_time d-flex gap-4">
                  <span><i class="fa-regular fa-clock"></i> 10.00 - 4.00</span>
                  <span><i class="fa-solid fa-location-dot"></i>Broklyn 40, USA</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="campaign_slier_item">
          <div class="row g-0 ">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 col-5">
              <div class="campaign_img">
                <img src="assets/images/c2.png" alt="">
                <a href="campaign-details.php">Read More</a>
              </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
              <div class="campaign_content">
                <div class="meta_date">
                  <span><i class="fa-regular fa-calendar-days"></i> 13 February, 2022</span>
                </div>
                <a href="campaign-details.php">
                  <h6>Blood Donation Camp</h6>
                </a>
                <p>Lorem ipsum dolor sit consectetur adipiscing elit, sed do incididunt et dolore magna aliqua.</p>
                <div class="meta_time d-flex gap-4">
                  <span><i class="fa-regular fa-clock"></i> 10.00 - 4.00</span>
                  <span><i class="fa-solid fa-location-dot"></i>Broklyn 40, USA</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="campaign_slier_item">
          <div class="row g-0">
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12 col-5">
              <div class="campaign_img">
                <img src="assets/images/c1.png" alt="">
                <a href="campaign-details.php">Read More</a>
              </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7 col-12">
              <div class="campaign_content">
                <div class="meta_date">
                  <span><i class="fa-regular fa-calendar-days"></i> 13 February, 2022</span>
                </div>
                <a href="campaign-details.php">
                  <h6>Free Group Checking</h6>
                </a>
                <p>Lorem ipsum dolor sit consectetur adipiscing elit, sed do incididunt et dolore magna aliqua.</p>
                <div class="meta_time d-flex gap-4">
                  <span><i class="fa-regular fa-clock"></i> 10.00 - 4.00</span>
                  <span><i class="fa-solid fa-location-dot"></i>Broklyn 40, USA</span>
                </div>
              </div>
            </div>
          </div>
        </div>
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
        <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. Excepteur
              cupidatatproident,
              culpa qui officia deserunt mollit</p>
          </div>
          <div class="testi_owner d-flex gap-4 align-items-center">
            <div class="testi_img img">
              <a href="#"><img src="assets/images/ts1.png" alt=""></a>
            </div>
            <div class="testi_name">
              <h5>Nora Fateha</h5>
              <p>Designer</p>
            </div>
          </div>
        </div>
        <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. Excepteur
              cupidatatproident,
              culpa qui officia deserunt mollit</p>
          </div>
          <div class="testi_owner d-flex gap-4 align-items-center">
            <div class="testi_img img">
              <a href="#"><img src="assets/images/ts2.png" alt=""></a>
            </div>
            <div class="testi_name">
              <h5>Niro Markusa</h5>
              <p>Designer</p>
            </div>
          </div>
        </div>
        <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. Excepteur
              cupidatatproident,
              culpa qui officia deserunt mollit</p>
          </div>
          <div class="testi_owner d-flex gap-4 align-items-center">
            <div class="testi_img img">
              <a href="#"><img src="assets/images/ts3.png" alt=""></a>
            </div>
            <div class="testi_name">
              <h5>Nicolas Mark</h5>
              <p>Designer</p>
            </div>
          </div>
        </div>
        <div class="testi_slider_item">
          <div class="testi_content">
            <div class="star">
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
              <span><i class="fa-solid fa-star"></i></span>
            </div>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore pariatur. Excepteur
              cupidatatproident,
              culpa qui officia deserunt mollit</p>
          </div>
          <div class="testi_owner d-flex gap-4 align-items-center">
            <div class="testi_img img">
              <a href="#"><img src="assets/images/ts1.png" alt=""></a>
            </div>
            <div class="testi_name">
              <h5>Nora Fateha</h5>
              <p>Designer</p>
            </div>
          </div>
        </div>
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
<section class="news gray ptb-115">
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
            <div class="meta d-flex gap-4">
              <span><i class="fa-regular fa-clock"></i> 18 Feb, 2022</span>
              <span><i class="fa-solid fa-comments"></i> 3 Comments</span>
            </div>
            <a href="blog-details.php">
              <h5><?php echo $data['title'] ?></h5>
            </a>
            <p><?php echo $data['description'] ?></p>
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
          <p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
            but occasionally
            circumstances occur in which toil and pain can procure reat pleasure.</p>
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
