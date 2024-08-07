<?php 
require 'db.php';

if(isset($_POST['submit']))
{
	$newpassword =$_POST['newpassword'];
	$conpassword=$_POST['conpassword'];
	$userid=$_SESSION['userid'];

	if($newpassword=='')
	{
		$msg=" enter newpassword";

	}
	else if($conpassword=='')
	{
		$msg="enter currentpassword";
	}
	else
	{
		if($newpassword==$conpassword)
		{
			$updatepass= $newpassword;
			$sql="update admin set password='$updatepass'where id=".$userid;
			mysqli_query($con,$sql);
			$msg="password is updated....!";
			header("location:index.php");

		}
		else
		{
			$msg="new password and currentpassword is not match";
		}
	}
	

}





 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Change Form</title>
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
</head>
<body>
    <form method="post">
    	<h3><?php echo @$msg; ?></h3>
        <h2>Password Change</h2>
        <label for="newpassword">New Password:</label>
        <input type="password" id="newpassword" name="newpassword" required>
        
        <label for="confirmpassword">Confirm Password:</label>
        <input type="password" id="conpassword" name="conpassword" required>

        <input type="submit" name="submit" value="Change Password">
    </form>
</body>
</html>
