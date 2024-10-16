<?php
include("header.php");
require_once('db.php');
$sql = "select * from faq";
$res = mysqli_query($con, $sql);
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "delete from faq where id = $id";
  mysqli_query($con, $sql);
}
$sql = "select * from faq";
mysqli_query($con, $sql);

// 
$limit = 3;

$total_res = "SELECT * FROM faq";
$total_rec = mysqli_query($con, $total_res);
$total_r = mysqli_num_rows($total_rec);

$total_pages = ceil($total_r / $limit);

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}

$start = ($page - 1) * $limit;
if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $sql = "SELECT * FROM faq WHERE question LIKE '%$search%' LIMIT $start, $limit";
} else {
  $sql = "SELECT * FROM faq LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

</head>

<body class="hold-transition sidebar-mini">
<  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View FAQ Data</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card grid_table">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Faq Question</th>
                    <th>Faq Anwser</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                      <td><?php echo $data['id'] ?></td>

                      <td><?php echo $data['question']; ?></t>
                      <td><?php echo $data['answer']; ?></td>
                      <td class="action_icon d-flex">
                        <a href="faq.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square "></i></a>
                        <a href="view_faq.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash-can "></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div style="margin: 20px 0px;" class="pagination">
                                <?php if ($page > 1) { ?>
                                    <a href="?page=<?php echo ($page - 1); ?>"><i class="fa-solid fa-chevron-left"></i></a>
                                <?php } ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <a href="?page=<?php echo $i; ?>"  class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                                <?php } ?>

                                <?php if ($page < $total_pages) { ?>
                                    <a href="?page=<?php echo ($page + 1); ?>"><i class="fa-solid fa-chevron-right"></i></a>
                                <?php } ?>
                            </div>
            </div>
            <!-- /.card-body -->

          </div>
          <!-- /.card -->
        </div>
      </section>
      <!-- /.content -->
    </div>

</body>

</html>
<?php
include("footer.php");
?>