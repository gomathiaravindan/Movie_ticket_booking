<!DOCTYPE html>
<html>
<head>
	<title>Account page</title>
	<meta name = "viewport" content = "width=device-width,initial-scale=1.0">
	<link rel="stylesheet" href="login.css">
	<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Righteous&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script:wght@700&family=Pacifico&family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
	<!--Form section-->
	<div class ="container">
		<div class="login_box">
			<div class="form_cont">
				<form method = "POST" action="#" autocomplete="off">
					<p>
						Username :&nbsp;&nbsp;&nbsp;<input type ="text" name ="user" required>
					</p>
					<br><br>
					<p>
						Email :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type ="email" p pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" required >
				    </p>
				    <br><br>
				    <p>
						Password :&nbsp;&nbsp;&nbsp;<input type ="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="pwd"  required>
					</p>
					<br><br>
					<p>
					<input type = "submit" value = "Signup" name="action">&nbsp;&nbsp;&nbsp;<input type ="submit" name ="action"value= "Login">
				</p>
				
				</form>
	</div>
  </div>
</div>
</body>
</html>

<?php 

 session_start();

 $host = "localhost";
 $db ="login_db";
 $user="root";
 $pwd="mysql";
 $username = $_POST['user'];
 $email=$_POST['email'];
 $passwrd=$_POST['pwd'];


 $conn =mysqli_connect($host,$user,$pwd,$db);
 $sql_e = "SELECT *FROM acc_tble WHERE Email = '$email'";
 $sql_p = "SELECT *FROM acc_tble WHERE Password = '$passwrd'";
 $res_e = mysqli_query($conn, $sql_e) or die(mysqli_error($conn));
 $res_p = mysqli_query($conn, $sql_p) or die(mysqli_error($conn));
 
 if($_POST['action']=="Signup")
{
	if(mysqli_num_rows($res_e)==0)
	{
		$query = "INSERT INTO acc_tble(User,Email,Password) VALUES('$username','$email','$passwrd')";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		 $_SESSION['login_user']= $username;
		 header("Location:welcome.php");
		 
	}
	else{?>
		<h2 id="echo1"><?php echo "You have already had an account,please login!!";?></h2>
		<?php die();
	}
}
else if($_POST['action']=="Login")
		{
			if(mysqli_num_rows($res_e)>0 )
			{
				if(mysqli_num_rows($res_p)>0)
				{?>
					<h2 id="echo2"><?php echo "Welcome ". $username;?>
					<?php $_SESSION['login_user']= $username;
					 
					header("Location:welcome.php");
			}
				else 
				{?>
					<h2 id="echo4"><?php echo "Password did not match!!";?></h2>
				<?php }
			}
			else if(mysqli_num_rows($res_e)==0)
			{?>
				<h2 id="echo3"><?php echo "To create acconut please signup!!";?></h2>
			<?php }
		
		}
		
	

 mysqli_close($conn);
 ?>