<?php
  
  session_start();
  ?><?php

   if(isset($_SESSION['login_user']))
   {?>


<!DOCTYPE html>
<html>
<head>
	<title>Movies Page</title>
	<meta name="viewport" content ="width=device-width,initial-scale=1.0">
	<meta charset = "utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="movies.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cinzel:wght@600&display=swap" rel="stylesheet">
	<!-- jQuery and JS bundle w/ Popper.js -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php

   $host = "localhost";
   $username = "root";
   $password = "mysql";
   $db = "login_db";

   $conn = mysqli_connect($host, $username, $password,$db);

   if(!$conn)
   {
    die("Connection Failed" .mysqli_connect_error());
   }
  
    ?>
		<nav class="text-dark bg">
			<ul>
				<li><a class="bottom"href="login.php" target="_blank">HOME</a></li>
				<li><a class="bottom" href="admin.php" target="_blank">ADMIN</a></li>
				<li><a class="bottom" href="contact.php" target="_blank">CONTACT</a></li>
				<li id="echo5" style="float:right;color:white;display:inline-block;padding:15px 20px;font-size:22px;font-family:Times Roman;font-weight:bolder;font-style:italic;"><?php echo "Welcome " . $_SESSION['login_user'];?>&nbsp;&nbsp;&nbsp;<i class="fa fa-user" aria-hidden="true" style="padding-right:10px;"></i></li>
				
			</ul>
		</nav>
	<div class="container-fluid">
		<div class="table-responsive">
			<table class="table">
  	<tbody>
    
		 <?php

    $sql = "SELECT *FROM img_tble";
    $qu = mysqli_query($conn,$sql);

   // $row = mysqli_num_rows($qu);
     if(mysqli_num_rows($qu)>0)
		 {
    while($row = mysqli_fetch_assoc($qu)){

   ?>
    <tr>
      <th>
         <?php ?>
       	
		<img src=" <?php  echo $row['image'];?> " width="400px" height="400px" >
		</th>
		
		<th>
		<h1 id="mv_name" style="float:left;font-family: 'Amiri', serif;font-size:40px;font-weight:bolder;"><?php echo $row['mov_name'];?></h1>
		
		<h2 id="mv_desc" style="float:left;text-align:left;font-family: 'Amiri', serif;"><?php echo $row['mov_desc'];
	}?></h2>
	
</th>
		<br><br>
  
</tr>
<?php }?>
</tbody>
</table>
<br>
	<input type="submit" name="action" value="Logout" class="btn btn-primary">
</body>
</html>

<?php }
   if($_POST['action']=='Logout')
   {
   	unset($_SESSION['login_user']);
   	header("Location:index.php");
   }
   ?>
