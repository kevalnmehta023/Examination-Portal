<?php


// echo 'sitaram';

$semester = 1;
$stream = '';
$subjectname = '';


if(isset($_GET['course_id']))
{
  
              

       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

 
       $result = mysqli_query($con,"SELECT * FROM course WHERE id='" .$_GET["course_id"]."'");
 
 
      // $row  = mysqli_fetch_array($result);
       if($result->num_rows > 0) {
           $z=1;
         while ($row = $result->fetch_assoc()) {
            $semester = $row['semester'];
            $stream = $row['stream'];
            $subjectname = $row['subjectname'];
            
 
              
      
         }
    
       } else {
        echo  "No Data";
       }
  }

// edit course

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
    //        // $id = intval($_GET['id']);
    //        // $query = "SELECT * FROM students WHERE id=:id";
    //        // $stmt = $DBcon->prepare( $query ); 
    //        // $stmt->execute(array(':id'=>$id));
    //        // $row=$stmt->fetch(PDO::FETCH_ASSOC);       
    //        // echo json_encode($row);
    //        // exit; 
     
           $result = mysqli_query($con,"SELECT * FROM course WHERE id='" .$_GET["course_id"]."'");
     
     
          // $row  = mysqli_fetch_array($result);
           if($result->num_rows > 0) {
            $z=1;
            while ($row1 = $result->fetch_assoc()) {
                // if ($row1['rollno']=== $rollno) {
                //     # code...
                //     echo "<script type='text/javascript'>
                //     alert('roll no already exist')
                //      </script>";
                // }
                // else if ($row1['sap']=== $sap) {
                //     # code...
                //     echo "<script type='text/javascript'>
                //     alert('sap already exist')
                //      </script>";
                // }
                // else if ($row1['email']=== $email) {
                //     # code...
                //     echo "<script type='text/javascript'>
                //     alert('email already exist')
                //      </script>";
                // }
                // else{

                     # code...
    $sql = "UPDATE course SET subjectname='".$_POST['subjectname']."',semester='".$_POST['semester']."',stream='".$_POST['stream']."' WHERE id='".$_GET['course_id']."'";

    if ($con->query($sql) === TRUE) {
      echo "<script type='text/javascript'>
      alert('Record updated successfully')
       </script>";
       $semester = '';
$stream = '';
$subjectname = '';

    } else {
      echo "Error updating record: " . $con->error;
    }
    
    $con->close();
                }
              
            }
           }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit course</title>
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
    <center>
        <h3>Edit Course</h3>
<form method="post" class="w-50">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Semester</label>
    
    <select class="form-control" id="exampleFormControlSelect1" name="semester">
    <option value="<?php echo  $semester;?>"><?php echo  $semester;?></option>

    <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
  <br>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Stream</label>

    <select class="form-control" id="exampleFormControlSelect2" name="stream">
    <option value="<?php echo  $stream;?>"><?php echo  $stream;?></option>

    <option value="IT">IT</option>
      <option value="CS">CS</option>
      <option value="DS">DS</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject Name </label>
    <input type="text" class="form-control" value="<?php echo  $subjectname;?>" id="exampleFormControlInput1" name="subjectname" placeholder="">
  </div>
 
 <br>
 <center>
 <button type="submit" class="btn btn-primary">Update Course</button>
 <a href="admin_dashboard.php"  class="btn btn-primary">Back to Admin Dashboard</a>

 </center>
</form>
</center>
</body>
</html>