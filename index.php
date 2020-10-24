<?php
    session_start();
    error_reporting(0);
    include('includes/config.php');

    // if($_SESSION['alogin'] != '') {
    //     $_SESSION['alogin'] = '';
    // }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = "SELECT UserName, Password FROM admin WHERE UserName = :username and Password = :password";
        $query = $conn->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            $_SESSION['alogin'] = $_POST['username'];
            header("Location: dashboard.php");
        } else {
            $error_message = 'Invalid Username or Password!';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <?php include 'includes/styles.php'; ?>
    </head>
    <body class="">
        <div class="main-wrapper">
            <div class="">
                <div class="row">
                    <img src="images/diu.png" class="diu-logo" alt="DIU">
                    <h1 align="center">Student Result Management System</h1>
                    <div class="col-lg-6 visible-lg-block">
                        <section class="section section-id-ms">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel" style="padding: 0px 0px 56px;">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>For Students</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">
                                                    <div class="section-title">
                                                        <p class="sub-title text-center">All of our Versity Students can search their result with providing <strong>Roll no</strong> , <strong>Batch</strong>, <strong>Department</strong> and <strong>Semister.</strong></p>
                                                    </div>
                                                    <form class="form-horizontal text-center" method="post">
                                                        <div class="form-group">
                                                            <p>Search your result</p>
                                                            <a href="find-result.php" class="button-result">click here</a>
                                                        </div>
                                                        
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                            
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                    </div>
                    <div class="col-lg-6">
                        <section class="section section-id-ms">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 ">
                                    <div class="row mt-30 ">
                                        <div class="col-md-11">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <div class="panel-title text-center">
                                                        <h4>Admin Login</h4>
                                                    </div>
                                                </div>
                                                <div class="panel-body p-20">
                                                    <div class="section-title">
                                                        <?php 
                                                            if (isset($error_message)) { ?>
                                                                <p class="alert alert-danger">
                                                                    <strong>Error! </strong>
                                                                    <?php echo $error_message; ?>
                                                                </p>
                                                        <?php  } ?>
                                                        
                                                        <p class="sub-title text-center">Only Admin can login here..</p>
                                                    </div>
                                                    <form class="form-horizontal" method="post">
                                                        <div class="form-group">
                                                            <label for="username" class="col-sm-2 control-label">Username</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" name="username" class="form-control" id="username" placeholder="User Name"  autocomplete="off">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="password" class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-10">
                                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group mt-20">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                
                                                                <button type="submit" name="login" class="btn btn-success btn-labeled pull-right">Sign in<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                            </div>
                                            <!-- /.panel -->
                                        </div>
                                        <!-- /.col-md-11 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.col-md-12 -->
                            </div>
                            <!-- /.row -->
                        </section>
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-sm-12">
                        <p class="text-muted text-center sm-system-id"><small>Developed by <strong>Shakil</strong></small></p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->
        </div>
        <!-- /.main-wrapper -->
       <?php include 'includes/scripts.php'; ?>
    </body>
</html>