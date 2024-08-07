<?php
include_once 'header.php';
?>
  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>Donate Now</h2>
          <ul>
            <li><a href="index-2.php">Home</a></li>
            <li class="active">Donate Now</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->
  <!-- donate form start -->
  <div class="gray_bg ptb-120">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-11 col-12">
          <div class="website__title text-center">
            <h2 class="mb-5">Make a Donation</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-11 col-12 ">
          <div class="km__nice__select">
            <h6 class="mb-30">Your Blood Donation</h6>
            <div class="select__box">
              <select class="nice_select">
                <option date-display="select">Enter Your Donate Blood Group</option>
                <option value="1">A +</option>
                <option value="2">A -</option>
                <option value="3">B +</option>
                <option value="4">B -</option>
                <option value="4">O +</option>
                <option value="4">O -</option>
                <option value="5">AB +</option>
                <option value="6">AB -</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-8 col-md-11 col-12">
          <div class="km__donate__form">
            <h6 class="mb-30">Details</h6>
            <div class="km__form__donat">
              <form action="#">
                <div class="row g-4">
                  <div class="col-12 col-sm-6">
                    <input type="text" placeholder="Frist Name">
                  </div>
                  <div class="col-12 col-sm-6">
                    <input type="text" placeholder="Last Name">
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-12 col-sm-6">
                    <input type="email" placeholder="Email">
                  </div>
                  <div class="col-12 col-sm-6">
                    <input type="text" placeholder="Adress">
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <textarea placeholder="Case Description..." rows="5"></textarea>
                  </div>
                </div>
                <button type="submit" class="primary__btn border-0">Donate Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- donate form start -->
  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>