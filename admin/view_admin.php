<?php
include("header.php");
require_once ('db.php');

// Delete logic (ensure $id is sanitized to prevent SQL injection)
if(isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast to integer to sanitize
    $sql = "DELETE FROM admin WHERE id = $id"; 
    mysqli_query($con, $sql);
}

// Pagination and search logic
$limit = 5;
$search = "";
$search_sql = "";

// Handle search functionality
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $search_sql = "WHERE name LIKE '%$search%'";
}

// Get the total number of records for pagination
$sql_total = "SELECT * FROM admin $search_sql";
$res_total = mysqli_query($con, $sql_total);
$total_records = mysqli_num_rows($res_total);
$total_pages = ceil($total_records / $limit);

// Handle pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Fetch records based on search and pagination
$sql = "SELECT * FROM admin $search_sql LIMIT $start, $limit";
$res = mysqli_query($con, $sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Admin</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="add_admin.php">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card grid_table">
                        <div class="card-body ">
                            <form method="get">
                                <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>">
                                <input type="submit" name="submit" value="search">
                            </form>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
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
                                            <td><?php echo $data['email']; ?></td>
                                            <td><img src="image/admin_img/<?php echo $data['image'] ?>" width="100px"></td>
                                            <td class="action_icon">
                                                <a href="view_admin.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="add_admin.php?id=<?php echo $data['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div style="margin: 20px 0px;" class="pagination">
                                <!-- Previous page link -->
                                <?php if ($page > 1) { ?>
                                    <a href="?page=<?php echo ($page - 1); ?>&search=<?php echo htmlspecialchars($search); ?>"><i class="fa-solid fa-chevron-left"></i></a>
                                <?php } ?>

                                <!-- Pagination numbers -->
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <a href="?page=<?php echo $i; ?>&search=<?php echo htmlspecialchars($search); ?>" class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                                <?php } ?>

                                <!-- Next page link -->
                                <?php if ($page < $total_pages) { ?>
                                    <a href="?page=<?php echo ($page + 1); ?>&search=<?php echo htmlspecialchars($search); ?>"><i class="fa-solid fa-chevron-right"></i></a>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include("footer.php");
?>
