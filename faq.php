<?php
include_once 'header.php';
$con= mysqli_connect("localhost","root","","blood");
$sql= "select * from faq";
$res= mysqli_query($con,$sql);

?>
  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>FAQ’S</h2>
          <ul>
            <li><a href="index-2.php">Home</a></li>
            <li class="active">FAQ’S</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- faq section start -->
  <section class="km__faq__section ptb-120">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12">
          <div class="common_title text-center">
            <p>FAQ'S</p>
            <h2>Frequently Asked Question</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col">
          <div class="accordion km_accordion" id="km_accordion">
            <?php 
            while($data= mysqli_fetch_assoc($res)){
             ?>
            
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                  <?php echo $data['question'] ?>
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#km_accordion">
                <div class="accordion-body">
                  <p>
                   <?php echo $data['answer'] ?>
                  </p>
                  
                 
                </div>
              </div>
            </div>
            <?php } ?>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- faq section start -->

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

  <!-- submit area start -->
 
  <!-- submit area start -->

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
    <?php
    $sql1 = "SELECT * FROM our_client";
    $res1 = mysqli_query($con, $sql1); // Corrected from $sql to $sql1
    while ($data = mysqli_fetch_assoc($res1)) {
        ?>
        <div class="slide__items">
            <div class="km_testimonials__bx text-center">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-7 col-sm-8 col-10">
                        <div class="km__testimonial__content">
                            <span>
                                "
                            </span>
                            <h4 class="text-white mb-30"><?php echo $data['name']; ?></h4>
                            <p class="text-white mb-30"><?php echo $data['description'];  ?></p>
                        </div>
                        <div class="user mt-30">
                            <img src="assets/image/curclient_img/<?php echo $data['image'] ?>" alt="User Image">
                            <h6 class="mt-30 text-white"><?php echo $data['name']; // Optional field for user name ?><span>Marketing Staff</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

    </div>
  </section>
  <!-- Testimonials section ends -->

  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>