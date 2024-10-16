<?php
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM contact WHERE id = $id";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
}

// Pagination logic
$limit = 5;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM contact WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM contact";
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
    $sql = "SELECT * FROM contact WHERE name LIKE '%$search%' LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM contact LIMIT $start, $limit";
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
                    <h1>Contact Info</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end"> 
                    <form method="get" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control" placeholder="Search Contact Name" value="<?php echo $search; ?>">
                        <input type="submit" name="submit" value="search" class="btn btn-dark">
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card grid_table "> 
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Massage</th>
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
                                            <td><?php echo $data['last_name']; ?></td>
                                            <td><?php echo $data['email']; ?></td>
                                            <td><?php echo $data['message']; ?></td>

                                            <td class="action_icon">
                                                <a href="contact.php?id=<?php echo $data['id']; ?>"><i
                                                        class="fa-solid fa-trash-can "></i></a>
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
                                    <a href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>

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
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include("footer.php");
?>