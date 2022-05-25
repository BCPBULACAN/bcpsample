<?php 
session_start();

include('includes/config.php');
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
    //something was posted
    $user_name = $_POST['user_name'];
    $verification = $_POST['verfication'];

    if(!empty($user_name) && !empty($verification) && !is_numeric($user_name))
    {

      //save to database
      $user_id = random_num(20);
      $query = "insert into verification (user_id,user_name,verfication) values ('$user_id','$user_name','$verification')";

      mysqli_query($con, $query);

      header("Location: login.php");
      die;
    }else
    {
      echo "Please enter some valid information!";
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="center">
      <h1>Sign up</h1>
      <form method="post">
        <div class="txt_field">
          <input name="user_name" type="text" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input name="verification" type="password" required>
          <span></span>
          <label>Verification</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
          May Account na? <a href="login.php">Login</a>
        </div>
      </form>
    </div>

  </body>
</html>
