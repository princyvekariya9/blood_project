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
                    <h1>contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="contact.php">Home</a></li>
                    </ol>
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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>lastname</th>
                                        <th>email</th>
                                        <th>massage</th>
                                        <th>delete</th>
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
                                        
                                        <td>
                                            <a href="contact.php?id=<?php echo $data['id']; ?>">delete</a>
                                        </td>
                                      
                                    </tr>
                                    <?php } ?>                
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                            <div style="margin: 20px 0px;" class="btn">
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
