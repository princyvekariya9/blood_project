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
   $userid = $_SESSION['userid'];
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
  $sql = "INSERT INTO slider (title,description ,image,userid) VALUES ('$title','$description', '$image','$userid')";
  }

  
  mysqli_query($con,$sql);
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

</head>
<body class="hold-transition sidebar-mini">
<form method="post" enctype="multipart/form-data">
  <div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slider Form</h1>
          </div>
          <div class="col-sm-6">
            
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">slider data</h3>
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
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    <?php if (!empty($data1['image'])): ?>
                                        <p>Current Image: <img src="image/news_img/<?php echo htmlspecialchars($data1['image']); ?>" alt="Current Image" style="max-width: 100px;"></p>
                                    <?php endif; ?>
                                </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
  
</body>
</html>
<?php 
  include ("footer.php");
?>