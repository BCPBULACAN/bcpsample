<?php
session_start();
error_reporting(0);
include('includes/config.php');
if($_SESSION['alogin']!=''){
$_SESSION['alogin']='';
}
if(isset($_POST['login']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{

    echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>BCP ADMIN</title>
    <link rel="stylesheet" href="css/stylelogin1.css">
  </head>
  <body>
    <div class="center">
      <h1>Login </h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" name="username" class="form-control" id="inputEmail3" >
          <label>Username</label>
        </div>
        <div class="txt_field">
        <input type="password" name="password" class="form-control" id="inputPassword3" >
          <span></span>
          <label>Password</label>
        </div>
        <input type= "submit" name="login" class="btn btn-success btn-labeled pull-right"><span class="btn-label btn-label-right"><i class="fa fa-check"></i></span><br>
        </div>
      </form>
    </div>

  </body>
</html>
