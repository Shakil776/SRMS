<?php
    session_start();
    error_reporting(0);

    include 'includes/config.php';

    if (strlen($_SESSION['alogin']) == '') {   
        header("Location: index.php"); 
    } else {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DIU | Dashboard</title>
        <?php include 'includes/dashboard_styles.php'; ?>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include 'includes/topbar.php'; ?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include 'includes/leftbar.php'; ?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-students.php">

                                            <?php 
                                                $sql = "SELECT id FROM tblstudents";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totalstudents = $query->rowCount();
                                            ?>

                                            <span class="number counter">
                                                <?php echo $totalstudents; ?>
                                            </span>
                                            <span class="name">Registered Student</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-danger" href="manage-subjects.php">

                                            <?php 
                                                $sql = "SELECT id from  tblsubjects";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totalsubjects = $query->rowCount();
                                            ?>
                                            <span class="number counter">
                                                <?php echo $totalsubjects; ?> 
                                            </span>
                                            <span class="name">Subjects Listed</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" href="manage-batch.php">

                                            <?php 
                                                $sql = "SELECT id from  tblbatch";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totalbatch = $query->rowCount();
                                            ?>

                                            <span class="number counter">
                                                <?php echo $totalbatch; ?>
                                            </span>
                                            <span class="name">Total Batch Listed</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-primary" href="manage-batch.php">
                                            <?php 
                                                $sql = "SELECT id from  tblbatch";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totaldepartment = $query->rowCount();
                                            ?>
                                            <span class="number counter">
                                                <?php echo $totaldepartment; ?> 
                                            </span>
                                            <span class="name">Total Department Listed</span>
                                            <span class="bg-icon"><i class="fa fa-file"></i></span>
                                        </a>
                                    <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-warning" style="margin-top: 25px;" href="manage-semester.php">
                                            <?php 
                                                $sql = "SELECT id from  tblsemester";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totalsemester = $query->rowCount();
                                            ?>
                                        <span class="number counter">
                                            <?php echo $totalsemester; ?>
                                        </span>
                                        <span class="name">Total Semester Listed</span>
                                        <span class="bg-icon"><i class="fa fa-book"></i></span>
                                        </a>
                                    <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->


                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a class="dashboard-stat bg-success" style="margin-top: 25px;" href="manage-results.php">
                                            <?php 
                                                $sql = "SELECT distinct StudentId from tblresult";
                                                $query = $conn->prepare($sql);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $totalresults = $query->rowCount();
                                            ?>

                                            <span class="number counter">
                                                <?php echo $totalresults; ?>
                                            </span>
                                            <span class="name">Total Results Declared</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.main-wrapper -->
       <!-- dashboard script -->
       <?php include 'includes/dashboard_scripts.php'; ?>
    </body>
</html>
<?php } ?>
