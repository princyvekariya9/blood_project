<?php
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM our_client WHERE id = $id";


    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
}

// Pagination logic
$limit = 5;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM our_client WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM our_client";
}

$res = mysqli_query($con, $sql);

// Check if query execution was successful
if (!$res) {
    die('Error: ' . mysqli_error($con));
}

$total_records = mysqli_num_rows($res);
$total_pages = ceil($total_records / $limit);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM our_client WHERE name LIKE '%$search%' LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM our_client LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

// Check if query execution was successful
if (!$res) {
    die('Error: ' . mysqli_error($con));
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1>View Client Data</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
<form method="get">
        <input type="text" name="search">
        <input type="submit" name="submit" value="search">
    </form>
    <section class="content">
        <div class="container-fluid">
            <div class="card grid_table">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client Name</th>
                                <th>Description</th>
                                <th>Role</th>
                                <th>Client Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['description']; ?></td>
                                    <td><?php echo $data['role']; ?></td>

                                    <td><img src="image/curclient_img/<?php echo $data['image']; ?>" width="100px"></td>
                                    <td class="action_icon d-flex">
                                        <a href="view_client.php?id=<?php echo $data['id']; ?>"><i  class="fa-solid fa-trash-can "></i></a>
                                        <a href="ourclient.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square "></i></a>
                                    </td> 
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                        </tfoot>
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
<!-- /.content-wrapper -->
<?php
include("footer.php");

?>
