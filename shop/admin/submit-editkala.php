<?php

session_start();
if(!isset($_SESSION['USER_ID']))
    exit(header("Location: ../login.html"));
else  $userID = $_SESSION['USER_ID'];



$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");
if(!$conn)
    exit("خطا در اتصال به پایگاه داده");

$kalaID = $_POST['kalaID'];


if(isset($_POST['deletekala']))
{//کالا را حذف کن

//حذف تصویر کالا

if($_POST['oldimage'] != "../files/images/kala/nophoto.png")  //چک کنیم که تصویر پیش فرض حذف نشود
{
    if(file_exists($_POST['oldimage'])) //بررسی اینکه فایل عکس وجود دارد یا خیر
        unlink($_POST['oldimage']); //حذف یک فایل از سرور
}

//حذف نظرات
$query = "delete  from comment where kID = $kalaID";
mysqli_query($conn , $query);

//حذف خود کالا
$query = "delete  from kala where kalaID = $kalaID";
mysqli_query($conn , $query);
exit("کالا با موفقیت حذف شد");


}
else if(isset($_POST['editkala']))
{//کالا را ویرایش کن

$kalaName = $_POST['kalaName'];
$kalaDesc = $_POST['kalaDesc'];
$kalaPrice = $_POST['kalaPrice'];
$category = $_POST['category'];
$date = date("Y-m-d H:i:s");


//در صورتی که تصویر کالا نیز تغییر کند
if(isset($_FILES['kalaImage'])) //عکس جدید انتخاب شود
{


if( isset($_FILES['kalaImage']) &&  move_uploaded_file( $_FILES['kalaImage']['tmp_name']  ,  "../files/images/kala/".time(). $_FILES['kalaImage']['name']   )  )
{
    //آدرس تصویر
    $imageAddress = "/files/images/kala/".time() . $_FILES['kalaImage']['name'] ;

}

}
else $imageAddress = $_POST['oldImage'];


$query = "update kala set name = '$kalaName' , description = '$kalaDesc' , price = '$kalaPrice' , category = '$category' , editDate = '$date' , image = '$imageAddress '
where kalaID = $kalaID";
mysqli_query($conn , $query);
exit("کالا با موفقیت ویرایش شد");
}




else exit("خطا");





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