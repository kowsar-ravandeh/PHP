<?php


//دریافت اطلاعات از کلاینت

$username = $_POST['username'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$mobile =$_POST['mobile'];
$address = $_POST['address'];
$siterules = $_POST['siterules'];
$date = date("Y-m-d H:i:s");

//بررسی امنیت داده ها

if($password != $repassword)
{
    exit("رمز عبور با تکرار رمز عبور یکسان نیست");
    //die("رمز عبور با تکرار رمز عبور یکسان نیست");
    //کاربرد تابع die , exit یکسان است
}
if(isValidEmail($email) == false)
{
    exit(" فرمت ایمیل وارد شده نا معتبر است");
}
if(isValidMobile($mobile) == false)
{
    exit(" فرمت موبایل وارد شده نا معتبر است");
}


//تعامل با پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
if($conn)
{
    $query = "INSERT INTO user 
    ( username, email, password, name, mobile, jensiat,  address, joinDate)
     VALUES
    ( '$username', '$email', '$password', '$name', '$mobile', '$gender', '$address', '$date') ";

//exit($query);

    if(mysqli_query($conn , $query))
    {
        //ثبت نام کامل شد
        header("Location: admin/");
    }
    else 
    {
        exit("خطا در ثبت نام");
        header("Location: login.html");
    }
    

    //print($query);
}
else print("failed to connect database!");



//تعریف تابع ارزیابی صحت ایمیل
function isValidEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !==false;
}
//تعریف تابع ارزیابی صحت موبایل
function isValidMobile($mobile)
{
    return preg_match("/^(09)([0-9]{9})+$/" , $mobile);
}

?>