<?php 
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $rec = "SELECT * FROM service WHERE id=".$id;
    $res = mysqli_query($con, $rec);
    $data = mysqli_fetch_assoc($res);
}
if(isset($_POST['submit']))
{
  $service=$_POST['service'];
  $description  =$_POST['description'];
  if(isset($_GET['id']))
  {
    $sql = "UPDATE service SET service='$service', description='$description'WHERE id=".$id;

  }else
  {
  $sql = "INSERT INTO service (service,description) VALUES ('$service','$description')";
  }

  
  mysqli_query($con,$sql);
}

 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-service">service form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">service</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="service" value="<?php echo @$data['service']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="description" value="<?php echo @$data['description'] ?>">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>

            </div>
            <!-- /.card -->

            <!-- general form elements -->
           
            <!-- /.card -->

            <!-- Input addon -->
            
            <!-- /.card -->
            <!-- Horizontal Form -->
            
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          
            <!-- general form elements disabled -->
            
            <!-- /.card -->
            <!-- general form elements disabled -->
            
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php
  include("footer.php");
 ?>