<?php
session_start();
if($_SESSION['USER_NAME'] != "admin")
    exit("دسترسی به این صفحه موجود نیست");

$cID = $_GET['cID'];
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");

if($conn)
{
    $query = "update comment set status = 1 where commentID = $cID ";

    if(mysqli_query($conn , $query))
    {
        exit(header("Location: ../admin/?page=comments"));
    }
    else 
    {
        exit("خطا در ثبت نظر");
    }
    

    //print($query);
}
else print("failed to connect database!");



?>