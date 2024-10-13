<?php
include("header.php");
require_once ('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Use intval to ensure $id is an integer
    $sql = "DELETE FROM campe WHERE id = $id"; 
    mysqli_query($con, $sql);
}

// Pagination logic
$limit = 5;

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

if (isset($_GET['page'])) {
    $page = intval($_GET['page']);
} else {
    $page = 1;
}

$start = ($page - 1) * $limit;

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
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="campe.php">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form method="get">
        <input type="text" name="search" placeholder="Search...">
        <input type="submit" name="submit" value="Search">
    </form>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Camp Table</h3>
                        </div>
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
                                    <?php 
                                    while ($data = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($data['id']); ?></td>
                                        <td><?php echo htmlspecialchars($data['title']); ?></td>
                                        <td><?php echo htmlspecialchars($data['date']); ?></td>
                                        <td><?php echo htmlspecialchars($data['description']); ?></td>
                                        <td><img src="image/campe_img/<?php echo htmlspecialchars($data['image']); ?>" width="100px"></td>
                                        <td><?php echo htmlspecialchars($data['time']); ?></td>
                                        <td>
                                            <a href="view_campe.php?id=<?php echo $data['id']; ?>">Delete</a>
                                        </td>
                                        <td>
                                            <a href="campe.php?id=<?php echo $data['id']; ?>">Edit</a>
                                        </td>
                                    </tr>
                                    <?php } ?>                
                                </tbody>
                            </table>
                            <div style="margin: 20px 0;">
                                <?php if ($page > 1) { ?>
                                    <a href="?page=<?php echo ($page - 1); ?>">Prev</a>
                                <?php } ?>
                                
                                <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                <?php } ?>
                                
                                <?php if ($page < $total_pages) { ?>
                                    <a href="?page=<?php echo ($page + 1); ?>">Next</a>
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
