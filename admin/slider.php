<?php
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $rec = "SELECT * FROM slider WHERE id=" . $id;
  $res = mysqli_query($con, $rec);
  $data = mysqli_fetch_assoc($res);
}

if (isset($_POST['submit'])) {
  $userid = $_SESSION['userid'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  
  $image = $_FILES['image']['name'];
  
  if (!empty($image)) {
    $path = "image/slider_img/" . $image;
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
  } else {
   
    $image = $data['image'];
  }

  if (isset($_GET['id'])) {
    $sql = "UPDATE slider SET title='$title', description='$description', image='$image' WHERE id=" . $id;
  } else {
    $sql = "INSERT INTO slider (title, description, image, userid) VALUES ('$title', '$description', '$image', '$userid')";
  }

  mysqli_query($con, $sql);
}
?>

<body class="hold-transition sidebar-mini">
  <form method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="mb-2 text-center">
            <h1>Add Slider Data</h1>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="d-flex justify-content-center">
          <div class="card form_clr">
            <div class="card-header py-3">
              <h3 class="card-title">Slider Data</h3>
            </div>

            <form method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Slider Title"
                    name="title" value="<?php echo @$data['title']; ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Description</label>
                  <input type="text" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter Slider Description" name="description"
                    value="<?php echo @$data['description'] ?>">
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

                  <?php if (!empty($data['image'])): ?>
                    <p>Current Image: <img src="image/slider_img/<?php echo htmlspecialchars($data['image']); ?>" alt="Current Image" style="max-width: 100px;"></p>
                  <?php endif; ?>
                </div>
              </div>

              <div class="card-footer bg-transparent border-top-0 pb-4 pt-0">
                <button type="submit" class="btn btn-dark" name="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </form>
</body>
</html>
<?php 
  include("footer.php");
?>
