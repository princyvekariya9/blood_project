<?php 
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $rec = "SELECT * FROM slider WHERE id=".$id;
    $res = mysqli_query($con, $rec);
    $data = mysqli_fetch_assoc($res);
}
if(isset($_POST['submit']))
{
  $title=$_POST['title'];
  $description  =$_POST['description'];
  $image=$_FILES['image']['name'];
  $path="image/slider_img/".$image;
  move_uploaded_file($_FILES['image']['tmp_name'],$path);
  if(isset($_GET['id']))
  {
    $sql = "UPDATE slider SET title='$title', description='$description',image='$image' WHERE id=".$id;

  }else
  {
  $sql = "INSERT INTO slider (title,description ,image) VALUES ('$title','$description', '$image')";
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
                <h3 class="card-title">admin form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="title" value="<?php echo @$data['title']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="description" value="<?php echo @$data['description'] ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">

                          <?php if(!empty($data['image'])): ?>
                            <span><?php echo $data['image']; ?></span>
                          <?php endif; ?>  
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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