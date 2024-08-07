<?php 
include ("header.php");
require_once ('db.php');

  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    $sql = "select * from blood where id=".$id;
    $res = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($res);
  }

  if(isset($_POST['submit']))
  {
      $bloodname = $_POST['bloodname'];
      

      if(isset($_GET['id']))
      
      {
          $id = $_GET['id'];
          $sql = "update blood set bloodname='$bloodname' where id=".$id;
      }else
      {
        $sql = "insert into blood (bloodname) values ('$bloodname')";
      }
      mysqli_query($con, $sql);
      // header("location:view_admin.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

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
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">offer Form</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">blood data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">blood name</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter bloodname" name="bloodname" value="<?php echo isset($data['bloodname']) ? $data['bloodname'] : ''; ?>">

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