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
<body class="hold-transition sidebar-mini">
<form method="post" enctype="multipart/form-data">
  <div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="  mb-2">
          <div class="text-center">
            <h1>Add FAQ</h1>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="d-flex justify-content-center"> 
            <div class="card form_clr" style="width: 40%;">
              <div class="card-header py-3">
                <h3 class="card-title">Faq Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Question" name="question" value="<?php echo isset($data['question']) ? $data['question'] : ''; ?>">

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Answer</label>
                   <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Answer" name="answer" value="<?php echo isset($data['answer']) ? $data['answer'] : ''; ?>">

                  </div>

                 
                <!-- /.card-body -->

                <div class="card-footer bg-transparent border-top-0 pb-0 pt-0 ps-0">
                  <button type="submit" class="btn btn-dark" name="submit">Submit</button>
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