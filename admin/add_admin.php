<?php 
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM admin WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $data1 = mysqli_fetch_assoc($res);
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $image = $_FILES['image']['name'];
    $path = "image/admin_img/".$image;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        
        $image_sql = ", image='$image'";
    } else {
        // If no new image is uploaded, retain the old image
        $image_sql = "";
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "UPDATE admin SET name='$name', email='$email', password='$password'$image_sql WHERE id=$id";
    } else {
        $sql = "INSERT INTO admin (name, email, password, image) VALUES ('$name', '$email', '$password', '$image')";
    }

    if (mysqli_query($con, $sql)) {
        echo "<p>Record saved successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($con) . "</p>";
    }
}
?>

<div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="  mb-2">
                <div class="  text-center">
                    <h1>Add Admin</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="d-flex justify-content-center"> 
                    <!-- general form elements -->
                    <h3><?php echo @$msg; ?></h3>
                    <div class="card form_clr">
                        <div class="card-header py-3">
                            <h3 class="card-title">Admin Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter Name" name="name" value="<?php echo htmlspecialchars(@$data1['name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email" name="email" value="<?php echo htmlspecialchars(@$data1['email']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo htmlspecialchars(@$data1['password']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Picture</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer bg-transparent border-top-0 pb-4 pt-0">
                                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
                            </div>
                        </form>

                    </div> 
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>
