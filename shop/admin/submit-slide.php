<?php

$link = $_POST['link'];
$slideDesc = $_POST['slideDesc'];

if( isset($_FILES['slideimg']) &&  move_uploaded_file( $_FILES['slideimg']['tmp_name']  ,  "../files/slider/picture/".time(). $_FILES['slideimg']['name']   )  )
{
    //آدرس تصویر
    $imageAddress =  "../files/slider/picture/".time(). $_FILES['slideimg']['name'];

}
    //آدرس تصویر پیش فرض
else  print("error");

//تعامل با پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");
if($conn)
{
    $query = "INSERT INTO slider ( link, description , src) VALUES ( '$link', '$slideDesc' , '$imageAddress') ";
    


    if(mysqli_query($conn , $query))
    {
        header("Location: ../admin/?page=slider");
    }
    else 
    {
        exit("خطا در ثبت کالا");
    }
    
}
else print("failed to connect database!");



?>