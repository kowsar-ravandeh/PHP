<?php
//بررسی اینکه آیا کاربر به سایت لاگین کرده یا نه
session_start();
if (!isset($_SESSION['USER_NAME'])) {
    exit(header("Location: ../login.html"));
    //exit("please login to access admin");
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بخش مدیریت سایت</title>

    <link href="../files/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../files/css/admin.css" type="text/css" rel="stylesheet" />
    <script src="../files/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <header>

        <div id="header">
            <img src="../files/images/cover.jpg" />
        </div>


        <div class="container-fluid" style="height: 80px;">

            <div class="row">

                <div class="col-6 site-name"> پنل مدیریت VIOLET SHOP</div>

                <div class="col-6 site-header-title"><?php print($_SESSION['NAME']); ?> عزیز خوش آمدید</div>

            </div>
        </div>

    </header>

    <section>
        <div class="row">
            <div class="col-3 p_0 container-left navigationbar">
                <ul>
                    <li><a href="../admin/?page=newkala">ارسال کالا</a></li>
                    <li><a href="../admin/?page=listkala">لیست کالا</a></li>
                    <li><a href="../admin/?page=category">دسته بندی ها</a></li>
                    <li><a href="../admin/?page=comments"> نظرات</a></li>
                    <li><a href="../admin/?page=users"> کاربران</a></li>
                    <li><a href="../admin/?page=slider"> اسلایدر</a></li>
                    <li><a href="../logout.php">خروج از پنل</a></li>
                </ul>

            </div>
            <div class="col-9 p_0 container-right">
                <?php
                //  اگر اندیس page تعریف شده بود صفحه را نمایش بده در غیر این صورت  با قرار دادن مقدار خالی سوییچ اجرا می شود
                if (isset($_GET['page']))
                    $page = $_GET['page'];
                else $page = "";
                switch ($page) {
                    case "category":
                        include("category.php");
                        break;
                    case "comments":
                        include("comments.php");
                        break;
                    case "newkala":
                        include("newkala.php");
                        break;
                    case "listkala":
                        include("listkala.php");
                        break;
                    case "editkala":
                        include("editkala.php");
                        break;
                    case "users":
                        include("users.php");
                        break;
                    case "slider":
                        include("slider.php");
                        break;
                    default:
                        print("به بخش مدیریت خوش آمدید. از بخش منو ها یک گزینه را انتخاب کنید." );
                }
                ?>

            </div>
        </div>
    </section>

    <footer>
        copyright &copy; 2023
    </footer>

</body>

</html>