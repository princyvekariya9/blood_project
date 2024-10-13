<?php
include_once 'header.php';
?>


  <!-- breadcrumb start -->
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
  <!-- breadcrumb end -->
  <!-- message box start -->
  <section class="km__message__box ptb-120">
    <div class="container">
      <div class="km__contact__form">
        <div class="row g-5">
          <div class="col-xl-7">
            <div class="km__box__form">
              <h4 class="mb-40">Get In Touch</h4>
              <p class="mb-30">We’re here to assist you with any questions or support you may need. Reach out to us
                today, and we’ll ensure a prompt and helpful response.
              </p>
              <form action="#" class="km__main__form">
                <div class="row">
                  <div class="col-sm">
                    <input type="text" placeholder="Frist Name">
                  </div>
                  <div class="col-sm">
                    <input type="text" placeholder="Last Name">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">
                    <input type="email" placeholder="Email">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm">
                    <textarea placeholder="Message" rows="3"></textarea>
                  </div>
                </div>
                <button type="submit" class="contact__btn">
                  Submit Request
                  <i class="fa-solid fa-angles-right"></i>
                </button>
              </form>
            </div>
          </div>
          <div class="col-xl-5">
            <div class="km__form__content">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- message box ends -->

  <!-- footer section start -->
  <?php
  include_once 'footer.php';
  ?>