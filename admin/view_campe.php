<?php
include("header.php");
require_once('db.php');

// Delete logic
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Use intval to ensure $id is an integer
    $sql = "DELETE FROM campe WHERE id = $id";
    mysqli_query($con, $sql);
}

// Pagination logic
$limit = 5;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1; // Ensure $page is always at least 1
$start = ($page - 1) * $limit;

$search = '';
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $sql = "SELECT * FROM campe WHERE title LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM campe";
}

$res = mysqli_query($con, $sql);

// Check if the query was successful
if (!$res) {
    die("Error executing query: " . mysqli_error($con));
}

$total_records = mysqli_num_rows($res);
$total_pages = ceil($total_records / $limit);

// Modify the SQL to include pagination
if (isset($_GET['search'])) {
    $sql = "SELECT * FROM campe WHERE title LIKE '%$search%' LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM campe LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

// Check if the query was successful
if (!$res) {
    die("Error executing query: " . mysqli_error($con));
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>view campe details</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end ">
                    <form method="get" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control"
                            value="<?php echo htmlspecialchars($search); ?>" placeholder="Search Camp Title" />
                        <input type="submit" name="submit" value="Search" class="btn btn-dark" />
                    </form>
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="add_blood.php" class="btn btn-dark rounded-pill ms-2"><i
                                    class="fa-solid fa-plus"></i></a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Search Form -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card grid_table"> 
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Time</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (mysqli_num_rows($res) > 0) { ?>
                                        <?php while ($data = mysqli_fetch_assoc($res)) { ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($data['id']); ?></td>
                                                <td><?php echo htmlspecialchars($data['title']); ?></td>
                                                <td><?php echo htmlspecialchars($data['date']); ?></td>
                                                <td><?php echo htmlspecialchars($data['description']); ?></td>
                                                <td><img src="image/campe_img/<?php echo htmlspecialchars($data['image']); ?>"
                                                        width="100px"></td>
                                                <td><?php echo htmlspecialchars($data['time']); ?></td>
                                                <td class="action_icon">
                                                    <a href="view_campe.php?id=<?php echo $data['id']; ?>"><i
                                                            class="fa-solid fa-trash-can"></i></a>
                                                </td>
                                                <td class="action_icon">
                                                    <a href="campe.php?id=<?php echo $data['id']; ?>"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <tr>
                                            <td colspan="8" style="text-align:center;">No records found</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                            <!-- Pagination -->
                            <div style="margin: 20px 0px;" class="pagination">
                                <?php if ($page > 1) { ?>
                                    <a
                                        href="?page=<?php echo ($page - 1); ?>&search=<?php echo htmlspecialchars($search); ?>"><i
                                            class="fa-solid fa-chevron-left"></i></a>
                                <?php } ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <a href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>"
                                        class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                                <?php } ?>

                                <?php if ($page < $total_pages) { ?>
                                    <a
                                        href="?page=<?php echo ($page + 1); ?>&search=<?php echo htmlspecialchars($search); ?>"><i
                                            class="fa-solid fa-chevron-right"></i></a>
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

<?php include("footer.php"); ?>