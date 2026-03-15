<?php 





// Student Delete Operation
if(isset($_GET['delete_id']))
{
    $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

     $sql="DELETE FROM students WHERE id=".$_GET['delete_id'];
     if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
        alert('Student Record deleted successfully')
         </script>";
        header("Location: admin_dashboard.php");
}
       
        } else {

          echo "<script type='text/javascript'>
         alert('Issue in Deleting student data')
          </script>";
          
        }



// Delete course data

        if(isset($_GET['course_id']))
{
    $con = mysqli_connect('127.0.0.1:3306','root','','nmims') or die('Unable To connect');

     $sql="DELETE FROM course WHERE id=".$_GET['course_id'];
     if ($con->query($sql) === TRUE) {
        echo "<script type='text/javascript'>
        alert('Course Record deleted successfully')
         </script>";
        header("Location: admin_dashboard.php");
}
       
        } else {

          echo "<script type='text/javascript'>
         alert('Issue in Deleting Course data')
          </script>";
         
        }
    

     
?>