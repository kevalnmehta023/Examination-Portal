<?php
    session_start();
    $message1="";
    if(count($_POST)>0) {

     
        $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM students WHERE sap='" . $_POST["s_sap"] . "' and password = '". $_POST["s_password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["s_id"] = $row['id'];
        $_SESSION["s_name"] = $row['name'];
        $_SESSION["s_stream"] = $row['stream'];
        $_SESSION["s_semester"] = $row['semester'];
        $_SESSION["s_rollno"] = $row['rollno'];
        } else {
         $message1 = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["s_id"])) {
    header("Location:stud_welcome.php");
    }
?>
<?php
    
    $message2="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM teachers WHERE sap='" . $_POST["t_sap"] . "' and password = '". $_POST["t_password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["t_id"] = $row['employee_id'];
        $_SESSION["t_name"] = $row['name'];
        $_SESSION["t_stream"] = $row['stream'];
        
        } else {
         $message2 = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["t_id"])) {
    header("Location:teacher_welcome.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NMIMS College</title>
    <link rel="icon" href="nmims.png" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style type="text/css">
    	.card{
    		box-shadow: 2px 2px 5px black;
    		transition: 1s;
    	}
    	.card:hover{
    		box-shadow: 8px 8px 10px grey; 
    	}
    </style>
    
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
          <!-- <li class="nav-item">
            <a class="nav-link" href="login.php">
          <i class="fa fa-address-book"></i> Login
        </a>
          </li> -->
          
        </ul>
        
      </div>
    </div>
  </div>
</nav>
<br>
<br>

<div class="row">
  <div class="col-sm-6 d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
  <img src="teacher.gif" class="card-img-top" alt="...">

  <div class="card-body mt-3 mx-auto">
   
    <a href="#" data-bs-target="#teacherloginModal" data-bs-toggle="modal" class="btn btn-primary">Teacher Login</a>
  </div>
  </div>
  </div>
  <div class="col-sm-6 d-flex justify-content-center">
   <div class="card" style="width: 18rem;">
  <img src="student.gif" class="card-img-top" alt="...">
  

  <div class="card-body mx-auto">
    
    <a href="#" data-bs-target="#studentloginModal" data-bs-toggle="modal" class="btn btn-primary">Student Login</a>
  </div>
</div>
  </div>
</div>




<!-- student Modal -->
<div class="modal fade" id="studentloginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Student Sign in</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <main class="form-signin w-100 m-auto">
  <form action="" method="post" id="">
    <center>
    <img class="mb-4" src="nmims-university-logo.png" alt="" width="140" height="67" >
    </center>
    <!-- <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1> -->
<div class="text-center text-danger"><?php if($message1!="") { echo $message1; } ?></div>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="s_sap">
      <label for="floatingInput">SAP ID</label>
    </div>
   <br>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="s_password">
      <label for="floatingPassword">Password</label>
    </div>
    <br>
    <center>
    <a class="text-center" href="reset_password.php">Forget password ?</a>
    </center>
    <br>
   <br>
   
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
  </form>
</main>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- teacher Modal -->
<div class="modal fade" id="teacherloginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher Sign in</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <main class="form-signin w-100 m-auto">
  <form action="" method="post">

    <center>
    <img class="mb-4" src="nmims-university-logo.png" alt="" width="140" height="67" >
    </center>
    <div class="text-center text-danger"><?php if($message2!="") { echo $message2; } ?></div>
    <!-- <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1> -->

    <div class="form-floating">
      <input type="text" class="form-control" name="t_sap" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">SAP ID</label>
    </div>
   <br>

    <div class="form-floating">
      <input type="password" class="form-control" name="t_password" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

   <br>
   
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2024</p>
  </form>
</main>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

</body>
</html>