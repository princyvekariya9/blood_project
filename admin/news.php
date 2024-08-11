<?php 
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Fetch existing data if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM news WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $data1 = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $path = "image/news_img/" . $image;

    if (!empty($image)) {
        move_uploaded_file($image_tmp, $path);
    } else {
        // If no new image is uploaded, use the existing one if editing
        $image = isset($data1['image']) ? $data1['image'] : '';
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "UPDATE news SET title=?, description=?, image=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sssi', $title, $description, $image, $id);
    } else {
        $sql = "INSERT INTO news (title, description, image) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $image);
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
                            <h3 class="card-title">News Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo htmlspecialchars(@$data1['title']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Enter description" name="description"><?php echo htmlspecialchars(@$data1['description']); ?></textarea>
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
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include("footer.php"); ?>
