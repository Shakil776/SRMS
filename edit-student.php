<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';

    if(strlen($_SESSION['alogin']) == ""){   
        header("Location: index.php"); 
    }else{
        $stid = intval($_GET['stid']);
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
            $sql = "UPDATE tblstudents SET name=:name,registration=:registration,roll=:roll,mobile=:mobile,email=:email,gender=:gender,batchId=:batch,departmentId=:department,semesterId=:semester,dob=:dob WHERE id=:stid ";
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
            $query->bindParam(':stid',$stid,PDO::PARAM_STR);
            $query->execute();
            $msg = "Student info updated successfully";
            header("Location: manage-students.php");
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title> SMS Admin| Edit Student </title>
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
                                    <h2 class="title">Student Admission</h2>
                                
                                </div>
                                
                                <!-- /.col-md-6 text-right -->
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
                                        <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                
                                        <li class="active">Student Admission</li>
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
                                            <div class="panel-body">
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo $msg; ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo $error; ?>
                                        </div>
                                        <?php } ?>
                                                <form class="form-horizontal" method="post">
<?php 

    $sql = "SELECT tblstudents.name,tblstudents.registration,tblstudents.roll,tblstudents.mobile,tblstudents.email,tblstudents.gender,tblstudents.RegDate,tblstudents.id,tblstudents.dob,tblbatch.batchname,tblbatch.department, tblsemester.semester FROM tblstudents JOIN tblbatch ON tblbatch.id=tblstudents.batchId JOIN tblsemester ON tblsemester.id=tblstudents.semesterId WHERE tblstudents.id=:stid";

    $query = $conn->prepare($sql);
    $query->bindParam(':stid',$stid,PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if($query->rowCount() > 0){
        foreach($results as $result){ ?>


<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Student Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" value="<?php echo $result->name; ?>" class="form-control" id="fullanme" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Registration Number</label>
    <div class="col-sm-10">
        <input type="text" name="registration" value="<?php echo $result->registration; ?>" class="form-control" id="regid" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Roll Number</label>
    <div class="col-sm-10">
        <input type="text" name="roll" value="<?php echo $result->roll; ?>" class="form-control" id="rollid" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Mobile Number</label>
    <div class="col-sm-10">
        <input type="text" name="mobile" value="<?php echo $result->mobile; ?>" class="form-control" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Email Address</label>
    <div class="col-sm-10">
        <input type="email" name="email" value="<?php echo $result->email; ?>" class="form-control" id="email" required="required" autocomplete="off">
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
        <?php
        $gndr = $result->gender;
        if($gndr == "0"){ ?>
            <input type="radio" name="gender" value="Male" required="required" checked> Male 
            <input type="radio" name="gender" value="Female" required="required"> Female 
            <input type="radio" name="gender" value="Other" required="required"> Other
        <?php }?>
        <?php  
        if($gndr == "1"){ ?>
            <input type="radio" name="gender" value="Male" required="required" > Male 
            <input type="radio" name="gender" value="Female" required="required" checked> Female 
            <input type="radio" name="gender" value="Other" required="required"> Other
        <?php } ?>
        <?php  
        if($gndr == "2"){ ?>
            <input type="radio" name="gender" value="Male" required="required" > Male 
            <input type="radio" name="gender" value="Female" required="required"> Female 
            <input type="radio" name="gender" value="Other" required="required" checked> Other
        <?php }?>
    </div>
</div>


<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Batch</label>
    <div class="col-sm-10">
        <input type="text" name="batch" class="form-control" id="classname" value="<?php echo $result->batchname; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Department</label>
    <div class="col-sm-10">
        <input type="text" name="department" class="form-control" id="classname" value="<?php echo $result->department; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label for="default" class="col-sm-2 control-label">Semester</label>
    <div class="col-sm-10">
        <input type="text" name="semester" class="form-control" id="classname" value="<?php echo $result->semester; ?>" readonly>
    </div>
</div>

<div class="form-group">
    <label for="date" class="col-sm-2 control-label">Date Of Birth</label>
    <div class="col-sm-10">
        <input type="date"  name="dob" class="form-control" value="<?php echo $result->dob; ?>" id="date">
    </div>
</div>

<?php }} ?>                                                    

                                                    
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
