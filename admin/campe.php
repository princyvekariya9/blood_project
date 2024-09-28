<?php 
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

// Check for connection errors
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $rec = "SELECT * FROM campe WHERE id=?";
    $stmt = mysqli_prepare($con, $rec);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])) {
     $userid = $_SESSION['userid'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $location = mysqli_real_escape_string($con, $_POST['location']);
    
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $path = "image/campe_img/" . $image;

    // Move uploaded image
    if (!empty($image)) {
        move_uploaded_file($image_tmp, $path);
    } else {
        $image = isset($data['image']) ? $data['image'] : '';
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "UPDATE campe SET title=?, date=?, description=?, image=?, time=?, location=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssi", $title, $date, $description, $image, $time, $location, $id);
    } else {
        $sql = "INSERT INTO campe (title, date, description, image, time, location,userid) VALUES (?, ?, ?, ?, ?, ?,?)";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "sssssss", $title, $date, $description, $image, $time, $location,$userid);
    }

    if (mysqli_stmt_execute($stmt)) {
        echo "Record saved successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_stmt_close($stmt);
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Camp Form</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="<?php echo htmlspecialchars(@$data['title']); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars(@$data['date']); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo htmlspecialchars(@$data['description']); ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <?php if (!empty($data['image'])): ?>
                                                <span><?php echo htmlspecialchars($data['image']); ?></span>
                                            <?php endif; ?>
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="time" class="form-control" id="time" name="time" value="<?php echo htmlspecialchars(@$data['time']); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars(@$data['location']); ?>">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
include("footer.php");
?>
