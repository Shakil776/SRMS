<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';
    if(strlen($_SESSION['alogin']) == ""){   
        header("Location: index.php"); 
    }else{
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $registration = $_POST['registration']; 
            $roll = $_POST['roll']; 
            $mobile = $_POST['mobile']; 
            $email = $_POST['email']; 
            $gender = $_POST['gender']; 
            $batch = $_POST['batch']; 
            $department = $_POST['department']; 
            $semester = $_POST['semester'];
            $dob = $_POST['dob'];
            $sql = "INSERT INTO  tblstudents(name,registration,roll,mobile,email,gender,batchId,departmentId,semesterId,dob) VALUES(:name,:registration,:roll,:mobile,:email,:gender,:batch,:department,:semester,:dob)";
            $query = $conn->prepare($sql);
            $query->bindParam(':name',$name,PDO::PARAM_STR);
            $query->bindParam(':registration',$registration,PDO::PARAM_STR);
            $query->bindParam(':roll',$roll,PDO::PARAM_STR);
            $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
            $query->bindParam(':email',$email,PDO::PARAM_STR);
            $query->bindParam(':gender',$gender,PDO::PARAM_STR);
            $query->bindParam(':batch',$batch,PDO::PARAM_STR);
            $query->bindParam(':department',$department,PDO::PARAM_STR);
            $query->bindParam(':semester',$semester,PDO::PARAM_STR);
            $query->bindParam(':dob',$dob,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $conn->lastInsertId();

            if($lastInsertId){
                $msg="Student information added successfully";
            }else {
                $error="Something went wrong. Please try again.";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> SMS Admin| Student Information </title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/select2/select2.min.css" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <!-- ========== LEFT SIDEBAR ========== -->
                   <?php include('includes/leftbar.php');?>  
                    <!-- /.left-sidebar -->

                    <div class="main-page">

                     <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title">Student Information</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Information</li>
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
                                            <h5>Fill the Student Information</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if($msg){?>
                                        <div class="alert alert-success left-icon-alert" role="alert">
                                            <strong>Well done! &nbsp;</strong><?php echo $msg; ?>
                                        </div><?php } 
                                        else if($error){?>
                                        <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap! &nbsp;</strong> <?php echo $error; ?>
                                        </div>
                                            <?php } ?>

                                        <form class="form-horizontal" method="post">

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Student Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" class="form-control" id="fullanme" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Registration Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="registration" class="form-control" id="regid" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Roll Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="roll" class="form-control" id="rollid" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Mobile Number</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="mobile" class="form-control" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Email Address</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="email" class="form-control" id="email" required="required" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="gender" value="0" required="required" checked=""> Male 
                                                    <input type="radio" name="gender" value="1" required="required"> Female 
                                                    <input type="radio" name="gender" value="2" required="required"> Other
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Batch</label>
                                                <div class="col-sm-10">
                                                    <select name="batch" class="form-control" id="default" required="required">
                                                        <option value="">Select Batch</option>
                                                    <?php 
                                                    $sql = "SELECT * from tblbatch";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                        <option value="<?php echo $result->id; ?>">
                                                            <?php echo $result->batchname; ?>
                                                        </option>

                                                    <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Department</label>
                                                <div class="col-sm-10">
                                                    <select name="department" class="form-control" id="default" required="required">
                                                        <option value="">Select Department</option>
                                                    <?php 
                                                    $sql = "SELECT * from tblbatch";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                        <option value="<?php echo $result->id; ?>">
                                                            <?php echo $result->department; ?>
                                                        </option>
                                                        
                                                    <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="default" class="col-sm-2 control-label">Semester</label>
                                                <div class="col-sm-10">
                                                    <select name="semester" class="form-control" id="default" required="required">
                                                        <option value="">Select Semester</option>
                                                    <?php 
                                                    $sql = "SELECT * from tblsemester";
                                                    $query = $conn->prepare($sql);
                                                    $query->execute();
                                                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                    if($query->rowCount() > 0)
                                                    {
                                                    foreach($results as $result)
                                                    {   ?>
                                                        <option value="<?php echo $result->id; ?>">
                                                            <?php echo $result->semester; ?>
                                                        </option>
                                                    <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="date" class="col-sm-2 control-label">Date Of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control" id="date">
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
