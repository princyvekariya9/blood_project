<?php 
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure $id is an integer
    $sql = "SELECT * FROM location WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
}

if (isset($_POST['submit'])) {
    $locations   = $_POST['locations'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); // Ensure $id is an integer
        $sql = "UPDATE location SET locations ='$locations  ', `date`='$date', time='$time' WHERE id=$id";
    } else {
        $sql = "INSERT INTO location (locations , `date`, time) VALUES ('$locations ', '$date', '$time')";
    }
    mysqli_query($con, $sql);
    // Redirect after insertion/updating if needed
    // header("Location: view_location.php");
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
                                <li class="breadcrumb-item active">Location Form</li>
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
                                    <h3 class="card-title">Location Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="locationname">Location Name</label>
                                            <input type="text" class="form-control" id="locationname" placeholder="Enter location name" name="locations" value="<?php echo isset($data['locations']) ? $data['locations  '] : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control" id="date" name="date" value="<?php echo isset($data['date']) ? $data['date'] : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="time">Time</label>
                                            <input type="time" class="form-control" id="time" name="time" value="<?php echo isset($data['time']) ? $data['time'] : ''; ?>">
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
        </div>
    </div>
</body>
</html>
<?php 
include("footer.php");
?>
