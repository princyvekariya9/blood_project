<?php
include 'db.php';
require_once 'header.php';
if(!isset($_SESSION['userid'])){
  header("location:index.php");
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
        </div> 
      </div> 
    </div>
  </div>
 <?php 
 include 'footer.php';
  ?>