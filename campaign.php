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
            <li><a href="index-2.php">Home</a></li>
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
              <span class="data-tags d-flex justify-content-center align-items-center">
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

  <!-- Testimonials section start -->
  <section class="km__testimonials__section ptb-115">
    <div class="container">
      <div class="row mb-5 ">
        <div class="col-12">
          <div class="common_title text-center">
            <p>Testimonials</p>
            <h2>What Our Clients Say</h2>
          </div>
        </div>
      </div>

      <div class="testimonials__slider">
        <div class="slide__items">
          <div class="km_testimonials__bx text-center">
            <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-6 col-md-7 col-sm-8 col-10">
                <div class="km__testimonial__content">
                  <span>
                    "
                  </span>
                  <h4 class="text-white mb-30">Professional services all the way</h4>
                  <p class="text-white mb-30"> These cases are perfectly simple and easy to distinguish. In a free hour,
                    when our power of choice is untrammelled and when nothing prevents our being able to do what we like
                    best, every pleasure is to be welcomed and every pain avoided. </p>
                </div>
                <div class="user mt-30">
                  <img src="assets/images/about/user.png" alt="images not found">
                  <h6 class="mt-30 text-white">Jhon Alexis <span>Marketing Staff</span></h6>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="slide__items">
          <div class="km_testimonials__bx text-center">
            <div class="row justify-content-center">
              <div class="col-xl-6 col-lg-6 col-md-7 col-sm-8 col-10">
                <div class="km__testimonial__content">
                  <span>
                    "
                  </span>
                  <h4 class="text-white mb-30">Professional services all the way</h4>
                  <p class="text-white mb-30"> These cases are perfectly simple and easy to distinguish. In a free hour,
                    when our power of choice is untrammelled and when nothing prevents our being able to do what we like
                    best, every pleasure is to be welcomed and every pain avoided. </p>
                </div>
                <div class="user mt-30">
                  <img src="assets/images/about/user.png" alt="images not found">
                  <h6 class="mt-30 text-white">Jhon Alexis <span>Marketing Staff</span></h6>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Testimonials section ends -->

  <!-- request & appoinment start -->
  <section class="request3 gray_bg ptb-115">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-xl-7 col-lg-9 col-md-10 col-12">
          <div class="common_title text-center">
            <p>registration</p>
            <h2>Your Donation Can Make Someone Life Better</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-12 mb-4 mb-xl-0 mb-lg-0" style="text-align: center; margin: auto;">
          <div class="current1">
            <h4>Good To Know Blood Donate</h4>
            <div class="payment">
              <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      How to donate on our site using your form?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere
                        possimus, voluptas assumenda est, omnis dolor repellendus.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      How to donate on our site using your form?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere
                        possimus, voluptas assumenda est, omnis dolor repellendus.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      How to donate on our site using your form?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere
                        possimus, voluptas assumenda est, omnis dolor repellendus.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      How to donate on our site using your form?
                    </button>
                  </h2>
                  <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere
                        possimus, voluptas assumenda est, omnis dolor repellendus.</p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                      data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      How to donate on our site using your form?
                    </button>
                  </h2>
                  <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod
                        maxime placeat facere
                        possimus, voluptas assumenda est, omnis dolor repellendus.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
  <!-- request & appoinment end -->

  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>