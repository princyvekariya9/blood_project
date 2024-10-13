<?php 
include ("header.php");
require_once ('db.php');

  if(isset($_GET['id']))
  {
    $id=$_GET['id'];
    
    $sql = "select * from faq where id=".$id;
    $res = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($res);
  }

  if(isset($_POST['submit']))
  {
      $userid = $_SESSION['userid'];
      $question = $_POST['question'];
      $answer = $_POST['answer'];

        if(isset($_GET['id'])){
          $id = $_GET['id'];
          $sql = "update faq set question='$question',answer='$answer' where id=".$id;
      }else
      {
         $sql = "INSERT INTO faq (question ,answer,userid)VALUES('$question','$answer','$userid')";
      }
      mysqli_query($con,$sql);
      
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

</head>
<body class="hold-transition sidebar-mini">
<form method="post" enctype="multipart/form-data">
  <div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FAQ Form</h1>
          </div>
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">faq data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">question</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter question" name="question" value="<?php echo isset($data['question']) ? $data['question'] : ''; ?>">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">answer</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter answer" name="answer" value="<?php echo isset($data['answer']) ? $data['answer'] : ''; ?>">

                  </div>

                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>
  
</body>
</html>
<?php 
  include ("footer.php");
?>