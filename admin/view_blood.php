<?php 
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM blood WHERE id = $id";
    mysqli_query($con, $sql);
}

$limit = 3;
$total_res = "SELECT * FROM blood";
$total_rec = mysqli_query($con, $total_res);
$total_r = mysqli_num_rows($total_rec);
$total_pages = ceil($total_r / $limit);

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $sql = "SELECT * FROM blood WHERE bloodname LIKE '%$search%' LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM blood LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

// Check for errors in the query
if (!$res) {
    die("Error executing query: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <form method="get">
        <input type="text" name="search" placeholder="Search blood name">
        <input type="submit" name="submit" value="Search">
    </form>
 

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blood Data View</h1>

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="add_blood.php">Home</a></li>
            </ol>

          </div>
          
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card grid_table">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>

                      <th>Blood Group Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                      <td><?php echo htmlspecialchars($data['id']); ?></td>
                      <td><?php echo htmlspecialchars($data['bloodname']); ?></td>

                      <td class="action_icon">
                        <a href="add_blood.php?id=<?php echo $data['id']; ?>"><i
                        class="fa-solid fa-pen-to-square "></i></a> 
                        <a href="view_blood.php?id=<?php echo $data['id']; ?>"><i
                        class="fa-solid fa-trash-can "></i></a>

                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>

                <div style="margin: 20px 0;" class="pagination">
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
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>
<?php 
include("footer.php");
?>
