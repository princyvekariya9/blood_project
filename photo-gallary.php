<?php
include_once 'header.php';
?>

  <!-- breadcrumb start -->
  <div class="breadcrumb_section overflow-hidden ptb-150">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 text-center">
          <h2>Photo Gallery</h2>
          <ul>
            <li><a href="index-2.php">Home</a></li>
            <li class="active">Gallery</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- gallery start -->
  <section class="gallery3 ptb-115 ">
    <div class="container">
      <div class="row mb-5">
        <div class="col-12 ">
          <div class="common_title text-center">
            <p>Gallary</p>
            <h2>Our Best Campaign Gallery</h2>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <?php 
            $con= mysqli_connect("localhost","root","","blood");
            $sql="SELECT * FROM gallery";
            $res= mysqli_query($con,$sql);
            while($data= mysqli_fetch_assoc($res)){
         ?>
         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-4">
          <div class="gallary_item">
            <img src="admin/image/gallery_img/<?php echo $data['image'] ?>" alt="">
            <a href="admin/image/gallery_img/<?php echo $data['image'] ?>" data-fancybox="gallery"><i class="fa-solid fa-plus"></i></a>
          </div>
        </div>
      <?php } ?>
        
      </div>
    </div>
    </div>
  </section>
  <!-- gallery end -->

  <!-- footer section start -->
  <?php
  include_once 'footer.php';  
?>