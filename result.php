<?php
    session_start();
    error_reporting(0);
    include 'includes/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DIU | Result</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body>
        <div class="main-wrapper">
            <div class="content-wrapper">
                <div class="content-container">

         
                    <!-- /.left-sidebar -->

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-md-6">
                                    <h2 class="title" align="left">Result Sheet</h2>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" style="font-size: 18px; margin-top: 15px; display:inline-block"  onclick="jQuery.print('#ele3')" data-toggle="tooltip" data-placement="bottom" title="Print"><i class="fa fa-print"></i></a>
                                </div>
                            </div>
                            <!-- /.row -->
                          
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">

                                <div class="row">
                              
                             

                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="panel result-sheet">
                                            <div class="panel-heading">
                                                <div class="panel-title">
<?php
    // code Student Data
    $rollid = $_POST['rollid'];
    $batchid = $_POST['batch'];
    $departmentid = $_POST['department'];
    $semesterid = $_POST['semester'];
    $_SESSION['rollid'] = $rollid;
    $_SESSION['batchid'] = $batchid;
    $_SESSION['departmentid'] = $departmentid;
    $_SESSION['semesterid'] = $semesterid;
    $query = "SELECT tblstudents.name,tblstudents.roll,tblstudents.registration,tblstudents.mobile,tblstudents.dob, tblstudents.gender, tblbatch.batchname,tblbatch.department, tblsemester.semester from tblstudents join tblbatch on tblbatch.id=tblstudents.batchId AND tblbatch.id=tblstudents.departmentId join tblsemester on tblsemester.id=tblstudents.semesterId where tblstudents.roll=:rollid and tblstudents.batchId=:batchid and tblstudents.departmentId=:departmentid and tblsemester.id=:semesterid ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':rollid',$rollid,PDO::PARAM_STR);
    $stmt->bindParam(':batchid',$batchid,PDO::PARAM_STR);
    $stmt->bindParam(':departmentid',$departmentid,PDO::PARAM_STR);
    $stmt->bindParam(':semesterid',$semesterid,PDO::PARAM_STR);
    $stmt->execute();
    $resultss = $stmt->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($stmt->rowCount() > 0){
        foreach($resultss as $row){ ?>
            <p><b>Student Name :</b> <?php echo $row->name;?></p>
            <p><b>Batch :</b> <?php echo $row->batchname;?></p>
            <p><b>Department :</b> <?php echo $row->department;?></p>
            <p><b>Semester :</b> <?php echo $row->semester;?></p>
            <p><b>Roll :</b> <?php echo $row->roll;?></p>
            <p><b>Registration :</b> <?php echo $row->registration;?></p>
            <?php 
                if($row->gender == 0){
                    $genderrs = "Male";
                }else{
                    $genderrs = "Female";
                }
             ?>
            <p><b>Gender :</b> <?php echo $genderrs;?></p>
            <p><b>Date Of Birth (DOB) :</b> <?php echo $row->dob;?></p>

<?php  } ?>

                                            </div>
                                            <div class="panel-body p-20">
                                                <table class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>    
                                                        <th>Marks</th>
                                                    </tr>
                                               </thead>
                                                 <tbody>
<?php
    if(isset($_POST['rollid'])){
        $roll = $_POST['rollid'];
    }
// Code for result

 // $query ="SELECT t.name,t.roll,t.ClassId,t.marks,SubjectId,tblsubjects.SubjectName from (SELECT sts.name,sts.roll,sts.ClassId,tr.marks,SubjectId from tblstudents as sts join  tblresult on tblresult.StudentId=sts.StudentId) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.roll=:rollid and t.ClassId=:classid)";

// $query ="SELECT t.name,t.roll,t.SemesterId,t.marks,tblresult.SubjectId,tblsubjects.SubjectName from (SELECT tblstudents.name,tblstudents.roll,tblstudents.semesterId,tblresult.marks,tblresult.SubjectId FROM tblstudents JOIN  tblresult ON tblresult.StudentId=tblstudents.id) as t join tblsubjects on tblsubjects.id=t.SubjectId where (t.roll=:rollid and t.SemesterId=:semesterid)";

    $query ="SELECT * from tblresult,tblsubjects,tblstudents where (tblstudents.roll = '$roll' and tblresult.studentId = tblstudents.id and tblresult.SubjectId = tblsubjects.id and tblstudents.batchid = tblresult.BatchId and tblstudents.semesterId = tblresult.SemesterId and tblstudents.departmentId = tblresult.DepartmentId)";

    $query = $conn->prepare($query);
    $query->execute();  
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($countrow = $query->rowCount()>0) {
        foreach($results as $result){ ?>
            <tr>
                <th scope="row"><?php echo $cnt;?></th>
                <td><?php echo $result->SubjectName;?></td>
                <td><?php echo $totalmarks=$result->marks;?></td>
            </tr>
<?php 
    $totlcount+=$totalmarks;
    $cnt++;}
?>


<?php
    $subcount = $cnt-1;
    $grade = $totlcount/$subcount;

        if ($grade < 40){
             $gradepoint = 'F';
             $gpa = '0.00';
         }
        else if ($grade >= 40 && $grade <45 ){
            $gradepoint = 'D';
            $gpa = '2.00';
        }

         else if ($grade >= 45 && $grade <50)
        {
            $gradepoint = 'C'; 
            $gpa = '2.25';
        }
         else if ($grade >= 50 && $grade <50){
             $gradepoint = 'C+';
             $gpa = '2.50';
         }
         else if ($grade >= 55 && $grade <60){
             $gradepoint = 'B-';
             $gpa = '2.75';
         }
         else if ($grade >= 60 && $grade <65){
             $gradepoint = 'B';
             $gpa = '3.00';
         }
         else if ($grade >= 65 && $grade <70){
             $gradepoint = 'B+';
             $gpa = '3.25';
         }
         else if ($grade >= 70 && $grade <75){
             $gradepoint = 'A-';
             $gpa = '3.50';
         }
         else if ($grade >= 75 && $grade <80){
             $gradepoint = 'A';
             $gpa = '3.75';
         }
        else if($grade >=80) {
            $gradepoint = 'A+';
            $gpa = '4.00';
        }
?>
<tr>
    <th scope="row" colspan="2">GPA</th>
    <td>
        <b> <?php echo $gpa; ?></b>
    </td>
</tr>

<tr>
    <th scope="row" colspan="2">Grade</th>           
    <td>
        <b><?php echo $gradepoint; ?> </b>
    </td>
</tr>


 <?php } else { ?>     
<div class="alert alert-warning left-icon-alert" role="alert">
                                            <strong>Notice!</strong> Your result not declare yet
 <?php }
?>
</div>
 <?php 
 } else
 {?>

<div class="alert alert-danger left-icon-alert" role="alert">
strong>Oh snap!</strong>
<?php
echo "Invalid Roll Number";
 }
?>
                                        </div>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.panel -->
                                    </div>
                                    <!-- /.col-md-6 -->

                                    <div class="form-group">
                                         <div class="col-sm-6">
                                            <a href="index.php">Back to Home</a>
                                        </div>
                                    </div>

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

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>
        <script src="js/jQuery.print.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>

    </body>
</html>
