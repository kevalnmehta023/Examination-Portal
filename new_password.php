<?php
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo $_SESSION["password_email"].'<br>'.$_POST["newpassword"];
        $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
        $sql = "UPDATE students SET password='".$_POST["newpassword"]."' where email = '".$_SESSION["password_email"]."'";

        if ($con->query($sql) === TRUE) {
          echo "<h2 style='text-align:center;color:green'>Password updated successfully</h2>";
            unset($_SESSION["password_email"]);
            echo "<center><a style='font-size:25px;' href='login.php'>Back to Login</a><center>";

        } else {
          echo "Error updating record: " . $con->error;
        }
        
        $con->close();
    }
   
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="icon" href="nmims.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
 <main class="form-signin w-25 m-auto">
  <form action="" method="POST" id="">
    <center>
    <img class="mb-4" src="nmims-university-logo.png" alt="" width="140" height="67" >
    </center>
    <h5 class="mb-3 fw-normal text-center">Please set new password</h5>
<div class="text-center text-danger"></div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com" name="newpassword">
      <label for="floatingInput">New Password</label>
    </div>
   <br>
    <Label name="msg"><?php echo $_SESSION['err_msg']; ?></Label>
    
   
    <br>
   
   
    <button class="btn btn-primary w-100 py-2" type="submit" >New Password set</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
  </form>
</main>
</body>
</html>