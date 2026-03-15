<?php
unset($_SESSION["username"]);
unset($_SESSION["a_password"]);
header("Location:admin_login.php");
?>