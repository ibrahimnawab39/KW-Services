
<?php
include_once "../../include/connection.php";
if(isset($_POST) & !empty($_POST))
{
    $email=mysqli_real_escape_string($con,$_POST['email']);
   
    // $query=mysqli_query($con,"select * from users where  email='$name'");
    $query=mysqli_query($con,"SELECT * FROM `users` where  email='$email'");

    $count=mysqli_num_rows($query);
    if($count > 0)
    {
        echo '<div style="color:red;font-size:11px"><b>'.$email.'</b> is Already Exist</div>
        <script> $(".btns").attr("disabled","disabled");</script>
        ';
     
    }
    else
    {
        echo '<div style="color:green;font-size:11px"><b>'.$email.'</b> Valid</div>
        <script> $(".btns").removeAttr("disabled");</script>
        ';
    }
   
    
}
?>

