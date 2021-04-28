
 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="add_del.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
  <nav class="text-dark bg">
      <ul>
        <li><a class="bottom"href="login.php" target="_blank">HOME</a></li>
        <li><a class="bottom" href="admin.php" target="_blank">ADMIN</a></li>
        <li><a class="bottom" href="contact.php" target="_blank">CONTACT</a></li>
</ul>
</nav>
<div class="container-fluid">
  <!--img src ="admin.jpg" width="1000" height="600" class="img-responsive"-->
<button type="button" id="btn1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add a movie</button>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD MOVIES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="#" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Movie Name</label>
            <input type="text" name="mov_name" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Movie Description</label>
            <input type="text" name ="mov_desc" class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Upload Movie:</label>
            <input type="file" name = "uploadfile" class="form-control" id="message-text" required>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Upload" name="uploadfilesub" class="btn btn-primary">
      </div>
       </form>
   </div>
  </div>
</div>
</div>

</body>
</html>


<?php

   $host = "localhost";
   $username = "root";
   $password = "mysql";
   $db = "login_db";
   $mov_name = $_POST['mov_name'];
   $mov_desc = $_POST['mov_desc'];

   $conn = mysqli_connect($host, $username, $password,$db);
   
  if($_POST['uploadfilesub']=='Upload')
  {
    if(isset($_POST['uploadfilesub']))
  
  {
      $files = $_FILES['uploadfile'];
      
      $filename = $files['name'];
      $fileerror = $files['error'];
      $filetmp= $files['tmp_name'];

      $fileext = explode('.',$filename);
      $filecheck =  strtolower(end($fileext));

       $fileextstored = array('png', 'jpg', 'jpeg');

       if(in_array($filecheck, $fileextstored))
       {
          $destinationfile = 'upload/' . $filename;
          move_uploaded_file($filetmp,$destinationfile);
        } 

        $q = "INSERT INTO img_tble(`image_name`,`image`, `mov_name`,`mov_desc`)VALUES('$filename','$destinationfile','$mov_name','$mov_desc')";

        $qry = mysqli_query($conn, $q);
       if($qry){?>
      <script>
        alert("Image uploaded successfully!!");
      </script>
      
   <?php  }
   }
 }
   ?>