<?php
session_start();
if ($_SESSION['USER_NAME'] != "admin")
    exit("دسترسی به این صفحه موجود نیست");


$sID = $_GET['sID'];
$conn = mysqli_connect("localhost", "root", "", "myshop");
mysqli_set_charset($conn, "utf8");

if ($conn) {
    $img = "select * from slider ";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($res))
    {
        if($row['id'] == $_GET['sID'])
        {
                if (file_exists($row['src'])) //بررسی اینکه فایل عکس وجود دارد یا خیر
                    unlink($row['src']); //حذف یک فایل از سرور
        }
    }

    $query = "delete from slider where id = $sID ";

    if (mysqli_query($conn, $query)) {

        exit(header("Location: ../admin/?page=slider"));

    } else {
        exit("خطا در حذف اسلاید");
    }


    //print($query);
} else print("failed to connect database!");
