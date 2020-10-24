<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';

    if(strlen($_SESSION['alogin']) == "") {   
        header("Location: index.php"); 
    } else {
        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['update'])) {
            $batchname = $_POST['batchname'];
            $department = $_POST['department'];
            $bid = intval($_GET['batchid']);
            $sql = "update tblbatch set batchname = :batchname, department = :department where id = :bid ";
            $query = $conn->prepare($sql);
            $query->bindParam(':batchname', $batchname, PDO::PARAM_STR);
            $query->bindParam(':department', $department, PDO::PARAM_STR);
            $query->bindParam(':bid', $bid, PDO::PARAM_STR);
            $query->execute();
            $msg = "Data has been updated successfully.";
            header("Location: manage-batch.php");
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SMS Admin Update Batch</title>
        <link rel="stylesheet" href="css/bootstrap.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('includes/topbar.php');?>   
          <!-----End Top bar-->
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
                                    <h2 class="title">Update Student Batch</h2>
                                </div>
                                
                            </div>
                            <!-- /.row -->
                            <div class="row breadcrumb-div">
                                <div class="col-md-6">
                                    <ul class="breadcrumb">
            							<li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            							<li><a href="#">Batch</a></li>
            							<li class="active">Update Batch</li>
            						</ul>
                                </div>
                               
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                             
                                <div class="row">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>Update Student Batch info</h5>
                                                </div>
                                            </div>

                                        <form action="" method="post">
                                            <?php 
                                                $bid = intval($_GET['batchid']);
                                                $sql = "SELECT * from tblbatch where id = :bid";
                                                $query = $conn->prepare($sql);
                                                $query->bindParam(':bid', $bid,PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $count = 1;

                                                if($query->rowCount() > 0){
                                                    foreach($results as $result) { ?>

                                        <div class="form-group has-success">
                                            <label for="success" class="control-label">Batch Name</label>
                                    		<div class="">
                                    			<input type="text" name="batchname" value="<?php echo $result->batchname;?>" required="required" class="form-control" id="success">
                                                <span class="help-block">Eg- E-60, E-61, E-62 etc</span>
                                    		</div>
                                    	</div>
                                       
                                     <div class="form-group has-success">
                                        <label for="success" class="control-label">Department</label>
                                        <div class="">
                                            <input type="text" name="department" value="<?php echo $result->department;?>" class="form-control" required="required" id="success">
                                            <span class="help-block">Eg- CSE, EEE etc</span>
                                        </div>
                                    </div>
                                    <?php }} ?>
                                    <div class="form-group has-success">

                                    <div class="">
                                       <button type="submit" name="update" class="btn btn-success btn-labeled">Update<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                </div>

                             </form>

                                              
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-md-8 col-md-offset-2 -->
                        </div>
                        <!-- /.row -->

                       
                       

                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.section -->

            </div>
            <!-- /.main-page -->

     
            <!-- /.right-sidebar -->

        </div>
        <!-- /.content-container -->
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>



        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
<?php  } ?>
