<?php


//دریافت اطلاعات از کلاینت

$username=$_POST['username'];
$password=$_POST['password'];

//بررسی امنیت داده ها


//تعامل با پایگاه داده

// mysqli_connect("host address" , "username" , "password" , "database name");
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
if($conn)
{
    $query = "select * from user where username = '$username' and password='$password' " ;
    
    //اجرای دستور مورد نظر از طریق کانکشن ایجاد شده در پایگاه داده
    $result=mysqli_query($conn , $query);
    //بررسی تعداد ردیف های بازگشتی از پایگاه داده
    if(mysqli_num_rows($result)==1)
    {
        //دریافت اطلاعات بازگشتی از پایگاه داده
        //اطلاعات به صورت یک آرایه در userInfo ذخیره می شود
        $userInfo = mysqli_fetch_array($result);

        //print("خوش آمدید");
        // ذخیره اطلاعات در session
        session_start();
        $_SESSION['USER_NAME'] = $username;
        //$_SESSION['USER_NAME'] = $userInfo['username'];
        $_SESSION['USER_ID'] = $userInfo['id'];
        $_SESSION['NAME'] = $userInfo['name'];
        $_SESSION['PROFILE_PHOTO'] = $userInfo['profilePhoto'];

        header("Location: admin/");
    }
    else 
    {
        //print("نام کاربری یا رمز عبور اشتباه است");
        header("Location: login.html");
    }
    

    //print($query);
}
else print("failed to connect database!");


?>