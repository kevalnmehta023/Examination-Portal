
<?php
session_start();
$student_data = array();
$student_room = array(101,201,301);
$a=0;
    
       //  if($_SESSION["s_id"]) {
       // $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

       //  $result = mysqli_query($con,"SELECT * FROM students WHERE id='" .$_SESSION["s_id"]."'");

       // // $row  = mysqli_fetch_array($result);
       //  if($result->num_rows > 0) {
       //      $z=1;
       //    while ($row = $result->fetch_assoc()) {
       //      }
   
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student NMIMS College</title>
    <link rel="icon" href="nmims.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="nmims-university-logo.png" width="150" height="60"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
        	<img src="nmims-university-logo.png" width="150" height="60">
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">
           <i class="fa fa-home"></i> Home
        </a>
          </li>
          <li class="nav-item">
           
          
           <a class="nav-link" href="Logout.php">
         <i class="fa fa-address-book"></i> 
         <?php
       if($_SESSION["s_name"]) {
       ?>
        
       <?php echo $_SESSION["s_name"]."<br>Roll No ".$_SESSION["s_rollno"].
       "<br>Semester ".$_SESSION["s_semester"].
       
       "<br> Stream ".$_SESSION["s_stream"]; ?>
          
       </a>
       <?php
       }else echo ""; 
       ?>
         </li>
          <li class="nav-item">
           
          
            <a class="nav-link" href="Logout.php">
          <i class="fa fa-address-book"></i> 
          <?php
        if($_SESSION["s_name"]) {
        ?>
        <?php //echo $_SESSION["s_name"]; ?>
           Logout
        </a>
        <?php
        }else echo "<h1>Please login first .</h1>"; 
        ?>
          </li>
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>
<?php
if($_SESSION["s_name"]) {
?>
<br>
<center>Welcome Student <?php echo $_SESSION["s_name"]; ?></center>
<!-- . Click here to <a href="logout.php" title="Logout">Logout. -->
<?php
}else echo "<h1>Please login first .</h1>";
?>

<?php

if ($_SESSION["s_semester"]==2) {
  echo "<center><a href='marksheet.php'>Semester 1 Marksheet</a></center>";
}
?>


<br>
  <h3 class="text-center">Exam Time Table</h3>

<table class="table table-bordered table-striped table-hover">
  <tr class="table-dark"> 
    <th>Sr No</th>
    <th>Date</th>
    <th>Subject</th>
    <th>Start Time</th>
    <th>End Time</th>

    <th>Semester</th>
    <th>Year</th>
    

   
  </tr>
  <tr>
    <?php 
      # code...
    if($_SESSION["s_id"]) {
       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

 $result = mysqli_query($con,"SELECT * FROM exam WHERE semester='" .$_SESSION["s_semester"] . "' and stream = '". $_SESSION["s_stream"]."'");

       // $row  = mysqli_fetch_array($result);
        if($result->num_rows > 0) {
            $z=1;
          while ($row = $result->fetch_assoc()) {
            
            ?>
            <tr>
            <td><?php echo $z++ ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['subject'] ?></td>
            <td><?php echo $row['starttime'] ?></td>
            <td><?php echo $row['endtime'] ?></td>
            <td><?php echo $row['semester'] ?></td>
            <td><?php echo $row['year'] ?></td>
            
          </tr>
            <?php

           
          }


         
        } else {
         echo  "No Data";
        }
    }
    ?>
    


  </tr>
 
  
  
</table>
<br>
<br>
<br>
<br>
<h3 class="text-center">Seating Arrangement</h3>

<table class="table table-bordered table-striped table-hover text-center">
 <tr><td colspan="3">Class room :<?php echo$student_room[0] ?></td></tr>
 
 
 <tr class="table-dark"> 
              <th>Row 1</th>
              <th>Row 2</th>    
              <th>Row 3</th>    
            </tr>
   <?php 
      
    if($_SESSION["s_id"]) {
       $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

        $result = mysqli_query($con,"SELECT * FROM students");
        

       // $row  = mysqli_fetch_array($result);
        if($result->num_rows > 0) {
          
          while ($row = $result->fetch_assoc()) {
            
           array_push($student_data,$row['rollno']);


// echo $row['rollno'];
            ?>  
            
             
            <?php           
          }         
        } else {
         echo  "No Data";
        }
       
        while ($a < 5) {
          # code...
        
        echo "<tr><td>".$student_data[$a]."</td>";
        echo "<td>".$student_data[$a+5]."</td>";
        echo "<td>".$student_data[$a+10]."</td></tr>";
        $a++;
      }
    }
    ?>

  </table>
 <h3 class="text-center">Seating Arrangement</h3>
<table class="table table-bordered table-striped table-hover text-center">
 <tr><td colspan="3 ">Class room :<?php echo$student_room[1] ?></td></tr>
 <tr class="table-dark"> 
              <th>Row 1</th>
              <th>Row 2</th>    
              <th>Row 3</th>    
            </tr>
            <?php
             while ($a < 10) {
          # code...
        
        echo "<tr><td>".$student_data[$a+10]."</td>";
        echo "<td>".$student_data[$a+15]."</td>";
        echo "<td>".$student_data[$a+20]."</td></tr>";
        $a++;
      }
            ?>
          </table>
          <h3 class="text-center">Seating Arrangement</h3>
<table class="table table-bordered table-striped table-hover text-center">
 <tr><td colspan="3 ">Class room :<?php echo$student_room[2] ?></td></tr>
 <tr class="table-dark"> 
              <th>Row 1</th>
              <th>Row 2</th>    
              <th>Row 3</th>    
            </tr>
            <?php
             while ($a < 15) {
          # code...
        
        echo "<tr><td>".$student_data[$a+20]."</td>";
        echo "<td>".$student_data[$a+25]."</td>";
        echo "<td>Empty</td></tr>";
        $a++;
      }
            ?>
          </table>
</body>
</html>