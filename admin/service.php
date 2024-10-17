<?php
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $rec = "SELECT * FROM service WHERE id=" . $id;
  $res = mysqli_query($con, $rec);
  $data = mysqli_fetch_assoc($res);
}
if (isset($_POST['submit'])) {
  $userid = $_SESSION['userid'];
  $service = $_POST['service'];
  $description = $_POST['description'];
  if (isset($_GET['id'])) {
    $sql = "UPDATE service SET service='$service', description='$description'WHERE id=" . $id;

  } else {
    $sql = "INSERT INTO service (service,description,userid) VALUES ('$service','$description','$userid')";
  }


  mysqli_query($con, $sql);
}

?>
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="  mb-2">
        <div class="text-center">
          <h1>Add Services Data </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="d-flex justify-content-center">
      <!-- general form elements -->
      <h3><?php echo @$msg; ?></h3>
      <div class="card form_clr" style="width: 40%;">
        <div class="card-header">
          <h3 class="card-title">Services Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Service Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service Name"
                name="service" value="<?php echo @$data['service']; ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Service Description</label>
              <!-- <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Service Description" name="description" value="<?php echo @$data['description'] ?>"> -->
              <textarea id="" type="text" class="form-control" id="exampleInputEmail1"
                placeholder="Enter Service Description" name="description"
                value="<?php echo @$data['description'] ?>"></textarea>
            </div>

          </div>
          <!-- /.card-body -->

          <div class="card-footer bg-transparent border-top-0 pb-4 pt-0">
            <button type="submit" class="btn btn-dark" name="submit">Submit</button>
          </div>
        </form>

      </div>
      <!-- /.card -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>
