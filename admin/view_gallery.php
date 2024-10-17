<?php
include("header.php");
require_once('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM gallery WHERE id = $id";
    mysqli_query($con, $sql);
}

// Pagination logic
$limit = 5;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM gallery WHERE name LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM gallery";
}

$res = mysqli_query($con, $sql);
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
    $sql = "SELECT * FROM gallery WHERE name LIKE '%$search%' LIMIT $start, $limit";
} else {
    $sql = "SELECT * FROM gallery LIMIT $start, $limit";
}

$res = mysqli_query($con, $sql);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Gallery Photoes </h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="gallry.php" class="btn btn-dark rounded-pill ms-2"><i
                      class="fa-solid fa-plus"></i></a></li>
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
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Action
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['id'] ?></td>
                                            <td><img src="image/gallery_img/<?php echo $data['image'] ?>" width="100px">
                                            </td>
                                            <td class="action_icon">
                                                <a href="view_gallery.php?id=<?php echo $data['id']; ?>"><i
                                                        class="fa-solid fa-trash-can "></i></a>
                                                <a href="gallry.php?id=<?php echo $data['id']; ?>"><i
                                                        class="fa-solid fa-pen-to-square "></i></a>
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
                                    <a href="?page=<?php echo $i; ?>"
                                        class="<?php echo ($i == $page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
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