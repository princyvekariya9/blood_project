<?php
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch existing data if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM gallery WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $data1 = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])) {
    $userid = $_SESSION['userid'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $path = "image/gallery_img/" . $image;

    if (!empty($image)) {
        move_uploaded_file($image_tmp, $path);
    } else {
        // If no new image is uploaded, use the existing one if editing
        $image = isset($data1['image']) ? $data1['image'] : '';
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "UPDATE gallery SET image = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $image, $id);
    } else {
        $sql = "INSERT INTO gallery (image,userid) VALUES (?,?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $image, $userid);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Record saved successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($con) . "</p>";
    }
    mysqli_stmt_close($stmt);
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="  mb-2">
                <div class="text-center">
                    <h1>Add Gallery Photoes</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="d-flex justify-content-center">
            <!-- general form elements -->
            <div class="card form_clr">
                <div class="card-header py-3">
                    <h3 class="card-title">Gallery Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
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
                                <p>Current Image: <img
                                        src="image/gallery_img/<?php echo htmlspecialchars($data1['image']); ?>"
                                        alt="Current Image" style="max-width: 100px;"></p>
                            <?php endif; ?>
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