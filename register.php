<?php
include_once 'header.php';
?>

  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-8 col-sm-10 col-12 text-center">
          <h2>Register As a Blood Donor</h2>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li class="active"> Register Now</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- resister box section start -->
  <section class="km__register__box ptb-120">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 offset-xl-2">
          <div class="text-center">
            <div class="km__website__title mb-30">
              <h2>Blood Cloud Organization</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center">
        <div class="col-xl-8">
          <div class="km__form__box">
            <form action="#">
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter Your Name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Location</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="location" rows="3"></textarea>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="password" placeholder="Enter Your Password">
          </div>
              <div class="row align-items-center g-4">
                <div class="col-md-5">
                  <button type="button" class="km__register__btn pt-3 pb-3 mt-3">
                    Submit
                    <span><i class="fas fa-arrow-right"></i></span>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- resister box section start -->

  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>