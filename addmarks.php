<?php
session_start();
// echo $_SESSION['t_stream'];
$student_marks_thoery = array();
$student_marks_internal = array();

$student_subjects = array();
// $student_data = array();
$message='';
$rollno=0;
if(isset($_GET['student_id']))
{
  
              

       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

 
       $result = mysqli_query($con,"SELECT * FROM students WHERE id='".$_GET['student_id']."'");
 
 
      // $row  = mysqli_fetch_array($result);
       if($result->num_rows > 0) {
           $z=1;
         while ($row = $result->fetch_assoc()) {
            // $semester = $row['semester'];
            // $stream = $row['stream'];
            // $name = $row['name'];
             $rollno = $row['rollno'];

            // $email = $row['email'];
            // $sap = $row['sap'];
            // $password = $row['password'];

            // echo $row['subjectname'].' <input type="text">';
 
              
      
         }
    
       } else {
        echo  "No Data";
       }


       $result1 = mysqli_query($con,"SELECT * FROM marksheet WHERE rollno='".$rollno."'");
       echo "<br><center><h3>Add Marks</h3></center>";
       echo "<br><center><h3 style='color:green'>".$message."</h3></center>";
       if($result1->num_rows > 0) {
        $z=1;
        
      while ($row = $result1->fetch_assoc()) {
         // $semester = $row['semester'];
         // $stream = $row['stream'];
         // $name = $row['name'];
        //   $rollno = $row['rollno'];

         // $email = $row['email'];
         // $sap = $row['sap'];
         // $password = $row['password'];
         array_push($student_subjects,$row['subjectname']);

         echo '
         <center>
         <label>'.$message.'</label>     
         <form method="post" class="w-50">
          
           <br>
         
           
           <div class="form-group">
             
             '.$row['subjectname'].' Theory marks <input type="text" class="form-control" value="" id="exampleFormControlInput1" name="theorymarks[]" placeholder="">
           </div>
           <div class="form-group">
             
           '.$row['subjectname'].' Internal marks <input type="text" class="form-control" value="" id="exampleFormControlInput1" name="internalmarks[]" placeholder="">
         </div>
          
          <br>
         
         
        
         ';

           
        //    array_push($student_marks_thoery,$row['rollno']);

   
      }
      echo ' <button type="submit" name="addmarks" class="btn btn-primary">Add Marks</button>

      <a href="teacher_welcome.php"  class="btn btn-primary">Back to Home page</a>


      </form>
     
     </center>';
 
    } else {
     echo  "No Data";
    }
  }



if(isset($_POST['addmarks'])) {
    
$student_marks_thoery = array_map('intval', $_POST['theorymarks']);

$student_marks_internal = array_map('intval', $_POST['internalmarks']);

foreach ($student_marks_thoery as $value) {
    if (empty($value)) {
    header("Location:teacher_welcome.php");
        

    }
}
foreach ($student_marks_internal as $value) {
    if (empty($value)) {
    header("Location:teacher_welcome.php");
        
        
    }
}


    $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
              for ($i=0; $i < count($student_marks_thoery) ; $i++) { 
                $sql = "UPDATE marksheet SET marks='".$student_marks_thoery[$i]."' , internal= '".$student_marks_internal[$i]."' where subjectname='".$student_subjects[$i]."' and rollno='".$rollno."'";
                  if ($con->query($sql) === TRUE) {
                   
                    // echo "Marks added successfully";
                   
                  } else {
                    // echo "<script type='text/javascript'>
                    // alert('Issue in Course Table entry')
                    //  </script>";
                    echo "Error: " . $sql . "<br>" . $con->error;
                  }
                # code...
              }
            //   $message="Marks added successfully";
              echo "<script type='text/javascript'>
              alert('Marks added successfully')
               </script>";
        $con->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Marks</title>
    <link rel="icon" href="nmims.png" type="image/x-icon">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

<!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>    
</head>
<body>
<!-- <center>
          <button type="submit" class="btn btn-primary">Update Course</button>
          <a href="admin_dashboard.php"  class="btn btn-primary">Back to Admin Dashboard</a>
         
          </center> -->
         


         <?php


    

// if(isset($_POST['addmarks'])) {
//     $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
//     foreach( $_POST['theorymarks'] as $theory  &&  $_POST['internalmarks'] as $internal) {
//           # code...
//           $sql = "INSERT INTO marksheet (marks,internal)
//           VALUES ('".$theory."', '".$internal."')";
//             if ($con->query($sql) === TRUE) {
//               echo "<script type='text/javascript'> 
//                alert('Course added successfully')
//                 </script>";
//               // unset($_POST['course_data_submit']);
             
//             } else {
//               echo "<script type='text/javascript'>
//               alert('Issue in Course Table entry')
//                </script>";
//               echo "Error: " . $sql . "<br>" . $con->error;
//             }
          
//     $con->close();
// }
// }
?>

</body>
</html>