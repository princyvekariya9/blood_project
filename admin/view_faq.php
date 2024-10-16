<?php 
include ("header.php");
require_once ('db.php');
$sql = "select * from faq";
$res = mysqli_query($con,$sql);
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $sql = "delete from faq where id = $id";
  mysqli_query($con, $sql);
}
  $sql = "select * from faq";
  mysqli_query($con, $sql);

  // 
  $limit = 3;

    $total_res = "SELECT * FROM faq";
    $total_rec = mysqli_query($con, $total_res);
    $total_r = mysqli_num_rows($total_rec);

    $total_pages = ceil($total_r / $limit);

    if(isset($_GET['page'])) 
    {
        $page = $_GET['page'];
    } else 
    {
        $page = 1;
    }

    $start = ($page - 1) * $limit;

    if(isset($_GET['search'])) 
    {
        $search = $_GET['search'];
        $sql = "SELECT * FROM faq WHERE question LIKE '%$search%' LIMIT $start, $limit";
    } else 
    {
        $sql = "SELECT * FROM faq LIMIT $start, $limit";
    }   

    $res = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <form method="get">
        <input type="text" name="search">
        <input type="submit" name="submit" value="search">
    </form>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FAQ data view</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="faq.php">Home</a></li>
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
                <h3 class="card-title">All FAQ Data view</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>id</th>
                      <th>question</th>
                      <th>anwser</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php while($data = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                      <th><?php echo $data['id'] ?></th> 
                      
                      <th><?php echo $data['question']; ?></th>
                      <th><?php echo $data['answer']; ?></th>

                      
                      <th>
                        <a href="add_faq.php?id=<?php echo $data['id']; ?>">Edit</a> || 
                        <a href="view_faq.php?id=<?php echo $data['id']; ?>">Delete</a>
                      </th>
                    </tr>
                  <?php } ?>
                  </tbody>
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

</body>
</html>
<?php 
include("footer.php");
?>