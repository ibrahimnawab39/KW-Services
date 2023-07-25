
<?php
include_once "../../include/connection.php";
if(isset($_POST) & !empty($_POST))
{
    $cate=mysqli_real_escape_string($con,$_POST['cate']);
   
    // $query=mysqli_query($con,"select * from users where  email='$name'");
    $query=mysqli_query($con,"Select * from plan_category where  category='$cate'");

    $count=mysqli_num_rows($query);
    if($count > 0)
    {
        echo '<div style="color:red;font-size:11px"><b>'.$cate.'</b> is Already Exist</div>
        <script> $(".btn").attr("disabled","disabled");</script>
        ';
     
    }
    else
    {
        echo '<div style="color:green;font-size:11px"><b>'.$cate.'</b> Valid</div>
        <script> $(".btn").removeAttr("disabled");</script>
        ';
    }
   
    
}
?>

