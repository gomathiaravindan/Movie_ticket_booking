<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta name = "viewport" content = "width=device-width,initial-scale=1.0">
  <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css2?family=Marcellus+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=New+Rocker&display=swap" rel="stylesheet">
</head>
<body>
  <div class= "container">
    <div class="admin_box">
            <div class="form_box">
                <form  method="post">
                 <p id="inp1"><strong><i>Username</i></strong>&nbsp;&nbsp;&nbsp;  <input type="text" name="user"></p>
                 <br/>
                 <p  id="inp2">
                  <strong><i>Password</i></strong> &nbsp;&nbsp;&nbsp;  <input type="password" name="pwd"></p>
                  <br/>
                  <p>
                  <input type="submit" name="action" value="Admin">&nbsp;&nbsp;&nbsp;
                  <input type="submit" value="Signin" formaction="login.php">
              </p>
       </div>
       </div> 
  </body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" ></script>


<?php

    $user = $_POST['user'];
    $pwd = $_POST['pwd'];

   if($_POST['action']=="Admin")
   {
    if($user == "Gomathi")
    {
        if($pwd == "gomathiA/20")
        {
             header("Location:welcome.php");
        }
        else{?>
            <h2>Password didn't match!!</h2>
      <?php  
            } 
    }
    else { ?>
        <h2 style="color:white;">Please enter the correct username!!</h2>
    <?php  }
}?>
   