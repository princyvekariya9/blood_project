<?php
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $sql = "select * from blood where id=" . $id;
  $res = mysqli_query($con, $sql);
  $data = mysqli_fetch_assoc($res);
}

if (isset($_POST['submit'])) {
  $userid = $_SESSION['userid'];
  $bloodname = $_POST['bloodname'];
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "update blood set bloodname='$bloodname' where id=" . $id;
  } else {
    $sql = "INSERT INTO blood (bloodname,userid)VALUES('$bloodname','$userid')";
  }
  mysqli_query($con, $sql);

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
    

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="  mb-2">
              <div class="  text-center">
                <h1>Add Blood Group</h1>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="d-flex justify-content-center">

            <div class="card form_clr" style="width: 40%;">
              <div class="card-header py-3">
                <h3 class="card-title">Blood Group Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blood Group Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Bloodname"
                      name="bloodname" value="<?php echo isset($data['bloodname']) ? $data['bloodname'] : ''; ?>">

                  </div>


                  <!-- /.card-body -->

                  <div class="card-footer bg-transparent border-top-0 ps-0 pt-0">
                    <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
  </form>

</body>

</html>
<?php
include("footer.php");
?>