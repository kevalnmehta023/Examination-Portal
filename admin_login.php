<?php
session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

$result = mysqli_query($con,"SELECT * FROM admin WHERE username='" .$_POST["username"] . "' and password = '". $_POST["password"] ."'");

    // $row  = mysqli_fetch_array($result);
     if($result->num_rows > 0) {
         $z=1;
       while ($row = $result->fetch_assoc()) {
        $_SESSION["username"]=$row['username'];
        $_SESSION["a_password"]=$row['password'];
    header("Location:admin_dashboard.php");

         ?>
         <!-- <tr>
         <td><?php //echo $z++ ?></td>
         <td><?php //echo $row['date'] ?></td>
         <td><?php //echo $row['subject'] ?></td>
         <td><?php //echo $row['starttime'] ?></td>
         <td><?php //echo $row['endtime'] ?></td>
         <td><?php //echo $row['semester'] ?></td>
         <td><?php //echo $row['year'] ?></td>
         
       </tr> -->
         <?php

        
       }


      
     } else {
        echo "<script type='text/javascript'>
        alert('Username or Password Incorrect')
         </script>";
     }
 }
 if(isset($_SESSION["username"])) {
    // header("Location:admin_dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
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
    <br><br>
<main class="form-signin w-25 m-auto">
  <form action="" method="post" id="">
    <center>
    <img class="mb-4" src="nmims-university-logo.png" alt="" width="140" height="67" >
    </center>
    <!-- <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1> -->
<div class="text-center text-danger"><?php if($message1!="") { echo $message1; } ?></div>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
      <label for="floatingInput">Username</label>
    </div>
   <br>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <br>
    <!-- <center>
    <a class="text-center" href="reset_password.php">Forget password ?</a>
    </center>
    <br> -->
   <br>
   
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
  </form>
</main>
</body>
</html>