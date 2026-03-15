

<?php
    session_start();
//     if ($_SESSION['username']==null) {
// header("Location:admin_login.php");
      
//     }
//     else{

//     }
$stud_name='';

// Edit student Data

//  if (isset($_POST['uid']) && !empty($_POST['uid'])) {
 
  
//   $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
// //   // $id = intval($_GET['id']);
// //   // $query = "SELECT * FROM students WHERE id=:id";
// //   // $stmt = $DBcon->prepare( $query ); 
// //   // $stmt->execute(array(':id'=>$id));
// //   // $row=$stmt->fetch(PDO::FETCH_ASSOC);       
// //   // echo json_encode($row);
// //   // exit; 

//   $result = mysqli_query($con,"SELECT * FROM students WHERE id='" .$_POST["uid"]."'");


//  // $row  = mysqli_fetch_array($result);
//   if($result->num_rows > 0) {
//       $z=1;
//     while ($row = $result->fetch_assoc()) {
//       $stud_name  = $row['name'];

//           // echo "connect";
       
     
//     }
   
//   } else {
//   //  echo  "No Data";
//   echo 'display_errors = ' . ini_get('display_errors') . "\n";
//   }
//  }

    // add student php code
    
    if(isset($_POST['student_data_submit'])) {

     
        # code...
        $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM students WHERE sap='" . $_POST["sap"] . "'or email='".$_POST['email']."' or rollno = '". $_POST["rollno"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)>0) {
        //   echo "<script type='text/javascript'>
        //  alert('SAP id or Email id or Rollno already registered')
        //   </script>";
      }
        else {
          
          $sql = "INSERT INTO students (name,semester, email,stream,rollno,year,sap,password)
        VALUES ('".$_POST['name']."', '".$_POST['sem']."', '".$_POST['email']."','".$_POST['stream']."','".$_POST['rollno']."','2024','".$_POST['sap']."','".$_POST['password']."')";
        
        if ($con->query($sql) === TRUE) {
        //   echo "<script type='text/javascript'>
        //  alert('New Student Record inserted successfully')
        //   </script>";
        } else {

        //   echo "<script type='text/javascript'>
        //  alert('Issue in student Table entry')
        //   </script>";
          // echo "Error: " . $sql . "<br>" . $con->error;
        }
        }






        
        
        $con->close();
    }




    // add course details
    if(isset($_POST['course_data_submit'])) {
      $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
    
            # code...
            $sql = "INSERT INTO course (stream,subjectname,semester)
            VALUES ('".$_POST['course_stream']."', '".$_POST['course_subject_name']."','".$_POST['course_sem']."')";
              if ($con->query($sql) === TRUE) {
                echo "<script type='text/javascript'> 
                 alert('Course added successfully')
                  </script>";
                // unset($_POST['course_data_submit']);
               
              } else {
                echo "<script type='text/javascript'>
                alert('Issue in Course Table entry')
                 </script>";
                echo "Error: " . $sql . "<br>" . $con->error;
              }
            
      $con->close();
  }
  
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" href="nmims.png" type="image/x-icon">
    
    <title>Admin Dashboard</title>

    

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

    <style>
      
      #course{
        display:none;
      }
    </style>


   <script>
   $(document).ready(function(){
  $("#cs").click(function(){
    $("#allstudents").hide();
    $("#course").show();
  });
  $("#as").click(function(){
    $("#allstudents").show();
    $("#course").hide();
  });
});


// $("#show").click(function(){
//   $("p").show();
// });
   </script>
  </head>
  <body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow ">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NMIMS ADMIN</a>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="alogout.php">Sign out</a>
    </li>
  </ul>
</nav>
<br>
<br>
<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#" id="as">
              <span data-feather="home"></span>
              All Students <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="#" id="cs">
              <span data-feather="layers"></span>
              Course Students
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <!-- <span>Saved reports</span> -->
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
      
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="allstudents">
      


      <h2>NMIMS All Students Details</h2>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addstudentmodal">Add Student</a>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Name</th>
              <th>Roll no</th>
              <th>Email</th>
              <th>SAP</th>
              <th>Password</th>
              <th>Semester</th>
              <th>Stream</th>
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php 
      # code...
    
       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

 $result = mysqli_query($con,"SELECT * FROM students");

       // $row  = mysqli_fetch_array($result);
        if($result->num_rows > 0) {
            $z=1;
          while ($row = $result->fetch_assoc()) {
            
            ?>
            <tr>
            <td><?php echo $z++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['rollno']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['sap']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            <td><?php echo $row['stream']; ?></td>
            <td><a href="javascript:student_id(<?php echo $row['id']; ?>)"   class="btn btn-success" >Edit</a>
            <td><a href="javascript:delete_id(<?php echo $row['id']; ?>)" class="btn btn-danger">Delete</a>
            
          </tr>
          <script>
  function delete_id(id)
{
  
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='admin_operation.php?delete_id='+id;
     }
}
function student_id(id)
{
  
     if(confirm('Sure you want to edit student data?'))
     {
        window.location.href='editstudent.php?student_id='+id;
     }
}
</script>

            <?php

           
          }


         
        } else {
         echo  "No Data";
        }
    
    ?>
            </tr>
           
          
          </tbody>
        </table>
      </div>
    </main>


    <!-- Course Details -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" id="course">
      


      <h2>Courses Details</h2>
      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addcoursemodal">Add Course</a>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Sr No</th>
              <th>Stream</th>
              <th>Subject Name</th>
              <th>Semester</th>
              
              <th>Edit</th>
              <th>Delete</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php 
      # code...
    
       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

 $result = mysqli_query($con,"SELECT * FROM course");

       // $row  = mysqli_fetch_array($result);
        if($result->num_rows > 0) {
            $z=1;
          while ($row = $result->fetch_assoc()) {
            
            ?>
            <tr>
            <td><?php echo $z++; ?></td>
            <td><?php echo $row['stream']; ?></td>
            <td><?php echo $row['subjectname']; ?></td>
            <td><?php echo $row['semester']; ?></td>
            
            <td><a href="javascript:edit_course_id(<?php echo $row['id']; ?>)"   class="btn btn-success" >Edit</a>

            <td><a href="javascript:course_id(<?php echo $row['id']; ?>)" class="btn btn-danger">Delete</a>

            
          </tr>
          <script>
  function course_id(id)
{
  // alert('sitaram')
     if(confirm('Sure To Remove This Record ?'))
     {
        window.location.href='admin_operation.php?course_id='+id;
     }
}
function edit_course_id(id)
{
  
     if(confirm('Sure you want to edit student data?'))
     {
        window.location.href='editcourse.php?course_id='+id;
     }
}
</script>
            <?php

           
          }


         
        } else {
         echo  "No Data";
        }
    
    ?>
            </tr>
           
          
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- add course modal -->




<div class="modal fade" id="Addcoursemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Course</h5>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Semester</label>
    <select name="course_sem" class="form-control" id="exampleFormControlSelect1" required>
      <option value="1">1</option>
      <option value="2">2</option>
     
    </select>
  </div>
  <br>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Stream</label>
    <select name="course_stream" class="form-control" id="exampleFormControlSelect2" required>
      <option value="IT">IT</option>
      <option value="CS">CS</option>
      <option value="DS">DS</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject Name </label>
    <input type="text" name="course_subject_name" class="form-control" id="exampleFormControlInput1" placeholder="" required>
  </div>
 
 <br>
 <center>
 <button type="submit" name="course_data_submit" class="btn btn-primary">Add Course</button>
 </center>
</form method="post">
      </div>
      <div class="modal-footer">
        <center>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </center>
      </div>
    </div>
  </div>
</div>











<!-- add student details modal -->
<div class="modal fade" id="Addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Semester</label>
    <select name="sem" class="form-control" id="exampleFormControlSelect1">
      <option value="1">1</option>
      <option value="2">2</option>
     
    </select>
  </div>
  <br>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Stream</label>
    <select name="stream" class="form-control" id="exampleFormControlSelect2">
    <option value="IT">IT</option>
      <option value="CS">CS</option>
      <option value="DS">DS</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  Name </label>
    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student Roll no </label>
    <input type="text" name="rollno" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student Email id </label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  SAP id </label>
    <input type="text" name="sap" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  Password </label>
    <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
 <br>
 <center>
 <button type="submit" name="student_data_submit" class="btn btn-primary">Add Student</button>
 </center>
</form>
      </div>
      <div class="modal-footer">
        <center>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </center>
      </div>
    </div>
  </div>
</div>









<!-- Edit Student modal -->



<div class="modal fade" id="Editstudentmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Student Details</h5>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="editstudentform">
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Semester</label>
    <select class="form-control" id="editstudentsemester">
    <option value="1">1</option>
      <option value="2">2</option>
     
    </select>
  </div>
  <br>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Stream</label>
    <select class="form-control" id="editstudentstream">
    <option value="IT">IT</option>
      <option value="CS">CS</option>
      <option value="DS">DS</option>
      <option value="MECH">MECH</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  Name </label>
    <input type="text" class="form-control" value="<?php echo  $stud_name;?>"  id="editstudentname" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student Roll no </label>
    <input type="text" class="form-control" id="editstudentrollno" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student Email id </label>
    <input type="text" class="form-control" id="editstudentemail" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  SAP id </label>
    <input type="text" class="form-control" id="editstudentsap" placeholder="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Student  Password </label>
    <input type="text" class="form-control" id="editstudentpassword" placeholder="">
  </div>
 <br>
 <center>
 <button type="submit" class="btn btn-primary">Update</button>
 </center>
</form>
      </div>
      <div class="modal-footer">
        <center>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </center>
      </div>
    </div>
  </div>
</div>










<!-- Edit course modal -->
<div class="modal fade" id="Editcoursemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Course</h5>
        <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> -->
          <!-- <span aria-hidden="true">&times;</span> -->
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group">
    <label for="exampleFormControlSelect1">Select Semester</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
     
    </select>
  </div>
  <br>

  <div class="form-group">
    <label for="exampleFormControlSelect2">Select Stream</label>
    <select class="form-control" id="exampleFormControlSelect2">
      <option>IT</option>
      <option>CS</option>
      <option>DS</option>
      <option>MECH</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Subject Name </label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
 
 <br>
 <center>
 <button type="button" class="btn btn-primary">Update Course</button>
 </center>
</form>
      </div>
      <div class="modal-footer">
        <center>
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        </center>
      </div>
    </div>
  </div>
</div>
<?php
   
?>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    </body>
</html>
