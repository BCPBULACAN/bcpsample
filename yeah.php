<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$fullname=$_POST['fullname'];
$address=$_POST['address']; 
$age=$_POST['age']; 
$lastschoolattended=$_POST['lastschoolattended']; 
$mothersname=$_POST['mothersname']; 
$fathersname=$_POST['fathersname']; 
$contactno=$_POST['contactno']; 
$email=$_POST['email']; 
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$sql="INSERT INTO admissionn(FullName,Address,Age,Lastschoolattended,MothersName,FathersName,ContactNo,Email,Gender,DOB) VALUES(:fullname,:address,:age,:lastschoolattended,:mothersname,:fathersname,:contactno,:email,:gender,:dob)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':lastschoolattended',$lastschoolattended,PDO::PARAM_STR);
$query->bindParam(':mothersname',$mothersname,PDO::PARAM_STR);
$query->bindParam(':fathersname',$fathersname,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
if($lastInsertId)
{
$msg=" We will inform you in your registered Email for more information";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> BCP ADMIN </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">BESTLINK COLLEGE OF THE PHILIPPINES</h2>
                                
                                </div>
                                
                  
                            </div>
        
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">               
                                        <li class="active">ADMISSION</li>
                                    </ul>
                                </div>
                             
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="container-fluid">
                           
                        <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Fill the Student info</h5>
                                                </div>
                                            </div>
                                            <form class="form-horizontal" method="post">
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Full Name</label>
<div class="col-sm-10">
<input type="text" name="fullname" class="form-control" id="fullanme" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Address</label>
<div class="col-sm-10">
<input type="text" name="address" class="form-control" id="address" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Age</label>
<div class="col-sm-10">
<input type="text" name="age" class="form-control" id="age" required="required" autocomplete="off">
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Lastschool Attended</label>
<div class="col-sm-10">
<input type="text" name="lastschoolattended" class="form-control" id="lastschoolattended"  required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Mothers Name</label>
<div class="col-sm-10">
<input type="text" name="mothersname" class="form-control" id="mothersname" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Fathers Name</label>
<div class="col-sm-10">
<input type="text" name="fathersname" class="form-control" id="fathersname" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Contact No.</label>
<div class="col-sm-10">
<input type="text" name="contactno" class="form-control" id="contactno" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Email</label>
<div class="col-sm-10">
<input type="email" name="email" class="form-control" id="email" required="required" autocomplete="off">
</div>
</div>

<div class="form-group">
<label for="default" class="col-sm-2 control-label">Gender</label>
<div class="col-sm-10">
<input type="radio" name="gender" value="Male" required="required" checked="">Male <input type="radio" name="gender" value="Female" required="required">Female <input type="radio" name="gender" value="Other" required="required">Other
</div>
</div>
<div class="form-group">
                                                        <label for="date" class="col-sm-2 control-label">DOB</label>
                                                        <div class="col-sm-10">
                                                            <input type="date"  name="dob" class="form-control" id="date">
                                                        </div>
                                                    </div>
                                                    

                                                    
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                    </div>
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/prism/prism.js"></script>
        <script src="js/select2/select2.min.js"></script>
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $(".js-states").select2();
                $(".js-states-limit").select2({
                    maximumSelectionLength: 2
                });
                $(".js-states-hide").select2({
                    minimumResultsForSearch: Infinity
                });
            });
        </script>
    </body>
</html>
<?PHP } ?>
