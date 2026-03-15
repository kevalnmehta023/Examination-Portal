<?php
session_start();
// echo "sitaram";
$_SESSION['err_msg']="";

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
  <form action="reset_password_code.php" method="POST" id="">
    <center>
    <img class="mb-4" src="nmims-university-logo.png" alt="" width="140" height="67" >
    </center>
    <!-- <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1> -->
<div class="text-center text-danger"></div>

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email id</label>
    </div>
   <br>
    <Label name="msg"><?php echo $_SESSION['err_msg']; ?></Label>
    
   
    <br>
   
   
    <button class="btn btn-primary w-100 py-2" type="submit" >send password reset link</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
  </form>
</main>
</body>
</html>