<?php
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM news WHERE id = $id";
    
    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }
}

// Pagination logic
$limit = 5;

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con, $_GET['search']);
    $sql = "SELECT * FROM news WHERE title LIKE '%$search%'"; // Changed 'name' to 'title'
} else {
    $sql = "SELECT * FROM news";
}

$res = mysqli_query($con, $sql);

// Check if query execution was successful
if (!$res) {
    die('Error: ' . mysqli_error($con));
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
    $sql = "SELECT * FROM news WHERE title LIKE '%$search%' LIMIT $start, $limit"; // Changed 'name' to 'title'
} else {
    $sql = "SELECT * FROM news LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

// Check if query execution was successful
if (!$res) {
    die('Error: ' . mysqli_error($con));
}

// Rest of your code remains unchanged...
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>News Tables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="news.php">Home</a></li>
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
                            <h3 class="card-title">news table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>title</th>
                                        <th>description</th>
                                        <th>image</th>
                                        <th>delete</th>
                                        <th>edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    while ($data = mysqli_fetch_assoc($res)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data['id']; ?></td>
                                        <td><?php echo $data['title']; ?></td>
                                        <td><?php echo $data['description']; ?></td>
                                        <td><img src="image/news_img/<?php echo $data['image']; ?>" width="100px"></td>
                                        <td>
                                            <a href="view_news.php?id=<?php echo $data['id']; ?>">delete</a>
                                        </td>
                                        <td>
                                            <a href="news.php?id=<?php echo $data['id']; ?>">edit</a>
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
?>    <!-- /.sidebar -->    