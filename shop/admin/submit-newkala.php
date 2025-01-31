<?php

session_start();
if(!isset($_SESSION['USER_ID']))
    exit(header("Location: ../login.html"));
else  $userID = $_SESSION['USER_ID'];
//دریافت اطلاعات از کلاینت

$kalaName = $_POST['kalaName'];
$kalaDesc = $_POST['kalaDesc'];
$kalaPrice = $_POST['kalaPrice'];
$category = $_POST['category'];

$date = date("Y-m-d H:i:s");

if( isset($_FILES['kalaImage']) &&  move_uploaded_file( $_FILES['kalaImage']['tmp_name']  ,  "../files/images/kala/".time(). $_FILES['kalaImage']['name']   )  )
{
    //آدرس تصویر
    $imageAddress = "/files/images/kala/".time() . $_FILES['kalaImage']['name'] ;

}
    //آدرس تصویر پیش فرض
else  $imageAddress = "/files/images/kala/nophoto.png";

//تعامل با پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");
if($conn)
{
    $query = "INSERT INTO kala 
    ( name, description , price , category, userID,image , submitDate)
     VALUES
    ( '$kalaName', '$kalaDesc', '$kalaPrice', $category, $userID , '$imageAddress', '$date') ";
    


    if(mysqli_query($conn , $query))
    {
        //کالا با موفقیت ثبت شد
        header("Location: ../admin/?page=listkala");
    }
    else 
    {
        exit("خطا در ثبت کالا");
        header("Location: login.html");
    }
    
}
else print("failed to connect database!");



?>