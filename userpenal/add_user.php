<?php 
$con= mysqli_connect("localhost","root","","blood");
include'header.php';

if(isset($_GET['id']))
{
   $id=$_GET['id'];
    $sql = "select * from user where id=".$id;
    $res = mysqli_query($con,$sql);
    $data1 = mysqli_fetch_assoc($res);
}

if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $image= $_FILES['image']['name'];
  $path="image/user_img/".$image;
  move_uploaded_file($_FILES['image']['tmp_name'],$path);

if(isset($_GET['']))
{
   $id=$_GET['id'];
   echo $sql = "update user set name='$name',email='$email',password='$password',image='$image'  where id=".$id;
   die();
    
}else
{
  $sql="insert into user(name,email,password,image)values('$name','$email','$password','$image')";
}

  
  mysqli_query($con,$sql);



}




 ?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <h3><?php echo @$msg; ?></h3>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">user form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name</label>
                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter Name" name="name" value="<?php echo @$data1['name']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" value="<?php echo @$data1['email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo @$data1['password'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image" value="<?php echo @$data1['image'] ?>">
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