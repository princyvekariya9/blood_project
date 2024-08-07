<?php 
require 'db.php';
$userid=$_SESSION['userid'];
if(isset($_POST['submit']))
{
	$password=($_POST['password']);
	$sql="select * from `user`where `id`=$userid  and `password`='$password'"; 
	$res= mysqli_query($con,$sql);
	$cnt=mysqli_num_rows($res);
	if($cnt==1)
	{
		header("location:update.php");
	}else
	{
		$msg="your  password is wrong";
	}
}

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	 <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f2f8; /* Light blue background */
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
 		<h2><?php echo @$msg; ?></h2>
 		<form method="post">
 			enter currentpass:
 			<input type="password" name="password">
 			<br><br>
 			<input type="submit" name="submit" value="click here">
 		</form>
 </body>
 </html>
