<?php 
$con = mysqli_connect("localhost", "root", "", "blood");
include 'header.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT image FROM slider WHERE id = $id";
    $res = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($res);
    $img_file = $data['image'];

    // Delete image file if it exists
    if(!empty($img_file)) {
        $img_path = 'image/slider_img/'.$img_file;
        if(file_exists($img_path)) {
            unlink($img_path);
        }
    }

    // Delete entry from database
    $sql = "DELETE FROM slider WHERE id = $id"; 
    mysqli_query($con, $sql);
}

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM slider WHERE id = $id";
  mysqli_query($con, $sql);
}

$limit = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Search logic
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_condition = $search ? "WHERE title LIKE '%$search%'" : '';

// Query to get total records
$total_res = mysqli_query($con, "SELECT COUNT(*) AS count FROM slider $search_condition");
$total_rec = mysqli_fetch_assoc($total_res);
$total_r = $total_rec['count'];

$total_pages = ceil($total_r / $limit);

// Query to fetch data based on search and pagination
$sql = "SELECT * FROM slider $search_condition LIMIT $start, $limit";
$res1 = mysqli_query($con, $sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form>
        <input type="search" name="" width="">
        <input type="submit" name="" value="search">
    </form>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with minimal features & hover style</h3>
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
                        <th>status</th>
                    </tr>
                 </thead>
                    <tbody>
                      <?php 
                        while($data= mysqli_fetch_assoc($res1))
                            {
                        ?>
                        <tr>
                             <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['title']; ?></td>
                          <td><?php echo $data['description']; ?></td>
                         <td><img src="image/slider_img/<?php echo $data['image']; ?> " width="100px"></td>
                 
                            <td>
                                <a href="view_slider.php?id=<?php echo $data['id'];  ?>">delete</a>
                            </td>
                             <td>
                             <a href="slider.php?id=<?php echo $data['id'];  ?>">edit</a>
                            </td>
                                     <td>
                <input type="checkbox" attr-value="<?php if($data['status']==0) { echo "1"; }else{ echo "0"; }?>"  class="check" attr-id="<?php echo $data['id']; ?>" <?php if($data['status']==1) { echo "checked"; } ?>>
            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
                            <div style="margin: 20px 0px  ;" class="btn">
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
<script type="text/javascript">

    $(document).ready(function(){

        $(document).on('click' , '.check' ,function(){

            var status = $(this).attr('attr-value');
            var id = $(this).attr('attr-id');

            $.ajax({
                type:"POST",
                url:"ajax.php",
                data:{"status":status,"id":id},

                success:function(res){
                    $('#ans').html(res);
                }
            })
        })
    })

</script>
