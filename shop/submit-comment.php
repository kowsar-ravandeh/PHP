<?php


//دریافت اطلاعات از کلاینت

$name = $_POST['name'];
$email = $_POST['email'];
$comment =$_POST['comment'];
$kID = $_POST['kID'];
$date = date("Y-m-d H:i:s");

//تعامل با پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");

if($conn)
{
    $query = "INSERT INTO comment 
    ( cname, email, comment , kID , submitDate)
     VALUES
    ( '$name', '$email', '$comment', '$kID', '$date') ";

//exit($query);

    if(mysqli_query($conn , $query))
    {
        //exit("نظر با موفقیت ثبت شد");
        exit(header("Location: product.php?kID=$kID"));
    }
    else 
    {
        exit("خطا در ثبت نظر");
    }
    

    //print($query);
}
else print("failed to connect database!");



?>