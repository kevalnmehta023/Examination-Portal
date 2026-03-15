<?php
 session_start();
 if ($_SESSION['s_semester']==2) {
   
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet</title>
    <link rel="icon" href="nmims.png" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<div class="container w-50 mt-1">
<table class="table table-bordered text-center">
<tr>
        
        <td colspan="5" class="text-center"><img src="nmims.png" width="100" height="100" alt="" srcset=""></td>
        
    </tr>
<tr>
        
    <td colspan="5" class="text-center">Student Name : <?php  echo  $_SESSION["s_name"];?></td>
    
</tr>
<tr>
    <td colspan="5" class="text-center">Roll No : <?php echo $_SESSION["s_rollno"];?></td>
    
</tr>
<tr>
    <td colspan="5" class="text-center">Programme : <?php  echo $_SESSION["s_stream"];?></td>
    
</tr>
<tr>
    <td colspan="5" class="text-center">Semester 1 <?php  ?></td>
    
</tr>
  
   
    <tr>
      <th >Subject Name</th>
      <th >TEE</th>
      <th >ICA</th>
      <th >Final Marks</th>
      <th >Out of Marks</th>
      <!-- <th scope="col">Last</th>
      <th scope="col">Handle</th> -->
    </tr>
  
  <?php
  $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
  $result = mysqli_query($con,"SELECT * FROM marksheet WHERE rollno='" . $_SESSION["s_rollno"] . "'");
  $total=0;
  $tot=0;
 if($result->num_rows > 0) {
    
  while ($row = $result->fetch_assoc()) {
    
  ?>
    <tr>
    <td><?php   echo $row['subjectname'];?></td>
      <td><?php   echo $row['marks'].'/100';
      $total = $total + $row['marks'];
      ?></td>
         <td><?php   echo $row['internal'].'/50';?></td>
         <td><?php  
         $tot= ($row['marks']/2)+$row['internal']+$tot;
         echo ($row['marks']/2)+$row['internal'];?></td>


        
      <td>100</td>
      
    </tr>
   <?php
  }
}

   ?>
  <tr>
      <th colspan="3">Total Marks </th>
      <th ><?php echo $tot;  ?></th>
      <th>600</th>
    </tr>
    <tr>
      <th colspan="3">Percentage </th>
      <th colspan="3"><?php echo (($tot/600)*100).' %';  ?></th>
     
    </tr>
</table>


<?php

} else {
    echo "No Data";
 }?>
 <center>

 <a href="stud_welcome.php" class="btn btn-primary">Go to your Home page</a>

 </center>
 </div>
</body>
</html>