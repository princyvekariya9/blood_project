<?php 
// Connect to the database
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

$data = [];
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $rec = "SELECT * FROM our_client WHERE id=?";
    $stmt = mysqli_prepare($con, $rec);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($con));
    }
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
}

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $role = mysqli_real_escape_string($con, $_POST['role']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $path = "image/curclient_img/" . $image;

    // Move uploaded image
    if (!empty($image)) {
        move_uploaded_file($image_tmp, $path);
    } else {
        $image = isset($data['image']) ? $data['image'] : '';
    }

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $sql = "UPDATE our_client SET name=?, description=?, role=?, image=? WHERE id=?";
        $stmt = mysqli_prepare($con, $sql);
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $description, $role, $image, $id);
    } else {
        $sql = "INSERT INTO our_client (name, description, role, image) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $sql);
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, "ssss", $name, $description, $role, $image);
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
                            <h3 class="card-name">Our Client Form</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo htmlspecialchars(@$data['name']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo htmlspecialchars(@$data['description']); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <input type="text" class="form-control" id="role" placeholder="Enter role" name="role" value="<?php echo htmlspecialchars(@$data['role']); ?>">
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
