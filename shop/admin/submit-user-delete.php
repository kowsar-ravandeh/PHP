<?php
session_start();
if($_SESSION['USER_NAME'] != "admin")
    exit("دسترسی به این صفحه موجود نیست");


$userID = $_GET['userID'];
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");

if($conn)
{
    $query = "delete from user where id = $userID ";

    if(mysqli_query($conn , $query))
    {
        exit(header("Location: ../admin/?page=users"));
    }
    else 
    {
        exit("خطا در حذف کاربر");
    }
    

    //print($query);
}
else print("failed to connect database!");



?>