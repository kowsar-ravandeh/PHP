<!DOCTYPE html>
<html>

<head>
    <title>VIOLET SHOP</title>
    <style>
        @font-face {
            font-family: B Kamran Bold;
            src: url("B Kamran Bold.ttf");
        }

        body {
            background-color: #f5dff2;
            margin: 0;
            padding: 0;
            font-family: B Kamran Bold;
        }


        #header img {
            width: 100%;
        }

        .top {
            background-color: #f0cbeb;
        }

        .cat {
            height: 130px;
            width: 100%;
            text-align: center;
        }

        .alog {
            text-decoration: none;
            color: #9b0086;
            font-size: 25px;
        }

        .areg {
            text-decoration: none;
            color: #9b0086;
            font-size: 25px;
        }

        .login {
            float: left;
            margin: 16px;
            padding: 5px;
            margin-left: 20px;
            margin-right: 0px;
        }

        .register {
            float: left;
            margin: 16px;
            padding: 5px;
            margin-left: 15px;
            margin-right: 0px;
        }

        .register :hover {
            border-bottom: solid 3px #9b0086;
        }

        .login :hover {
            border-bottom: solid 3px #9b0086;
        }


        #search-bar {
            text-align: center;
            padding: 20px;
            font-family: B Kamran Bold;
            font-size: 20px;
        }

        #search-input {
            text-align: right;
            padding: 10px;
            direction: rtl;
            width: 400px;
            border-radius: 8px;
        }

        .submit {
            background-color: #9b0086;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            padding: 8px 10px;
            width: 8%;
            font-family: B Kamran Bold;
            font-size: 20px;
        }



        #footer {
            background-color: #9b0086;
            color: #fff;
            padding: 20px;
            text-align: center;

        }


        .product {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: inline-block;
            margin: 30px;
            padding: 10px;
            width: 27%;

        }

        .product img {
            max-width: 100%;
        }

        .product h2 {
            font-size: 18px;
            margin: 10px 0;
        }

        .product p {
            color: #888;
            font-size: 14px;
            margin: 0;
        }

        .product button {
            background-color: #9b0086;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            display: block;
            margin-top: 10px;
            padding: 8px 10px;
            width: 100%;
            font-family: B Kamran Bold;
            font-size: 20px;
        }

        .product button:hover {
            background-color: #b00198;
        }

        hr {
            color: #9b0086;
        }












        .pr {
            height: 900px;
        }


        .navigationbar ul {
            margin: 0;
            padding: 0;
        }

        .navigationbar li {
            display: block;
            width: 100%;
            height: 50px;
            line-height: 50px;
            text-align: center;
        }

        .navigationbar li:hover {
            background-color: #f5dff2;
        }

        .navigationbar a {
            text-decoration: none;
            color: #750f53;
            font-weight: bold;
        }

        .container-left {
            background-color: #f5dff2;
            color: #000;
            float: right;
            width: 100%;

        }










        /* slider */

        .slider {
            background-color: #f5dff2;
            width: 100%;
            height: 300px;
        }

        #all {
            width: 100%;
            height: 300px;
            background: #9b0086;
            position: absolute;
            right: 0;
            left: 0;
            margin: 0 auto;
        }

        #slideshow {
            width: 98%;
            height: 270px;
            background: #CF0;
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto auto;
        }

        #next {
            position: absolute;
            right: 20px;
            top: 150px;
            z-index: 20;
        }

        #prev {
            position: absolute;
            left: 20px;
            top: 150px;
            z-index: 20;
        }

        /* #slideshow img {
            width: 100%;
            height: 100%;
        } */
    </style>


    <!-- slider -->
    <script src="files/slider/js/jquery.js"></script>
    <script src="files/slider/js/cycle.js"></script>
    <script>
        $("#slideshow").cycle({
            next: "#next",
            prev: "#prev"

        });
    </script>


    <link href="../files/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="../files/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div id="header">
        <img src="files/images/cover.jpg" />
    </div>

    <div class="top">
        <div class="login"><a class="alog" href="login.html">ورود</a></div>
        <div class="register"><a class="areg" href="register.html">ثبت نام</a></div>
        <div class="register"><a class="areg" href="register.html">سبدخرید</a></div>
        <div class="register"><a class="areg" href="cat-list.php">دسته بندی</a></div>
        <div id="search-bar">

            <form action="search.php" method="post">
                <input type="text" name="search" id="search-input" placeholder="جستجوی محصولات...">
                <input type="submit" value="جستجو " class="submit"/>
            </form>
        </div>





    </div>

    <div class="slider">
        <div id="all">
            <div id="slideshow">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "myshop");
                mysqli_set_charset($conn, "utf8");
                if ($conn) {
                    $sql = "SELECT * FROM slider";
                    $resultt = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_array($resultt)) {
                        print('<a href=" ' . $rows['link'] . ' " style="z-index: 20;"> <img src="../project' . $rows["src"] . '" style="width: 1490px;height: 265px;"> </a>');
                    }
                }



                ?>
            </div>

            <div id="next"><img src="files/slider/picture/next.png" width="35" height="35"></div>
            <div id="prev"><img src="files/slider/picture/prev.png" width="35" height="35"></div>
        </div>
    </div>



    <section class="pr">

        <div></div>



        <div class="container-left">
            <?php
            $setq = "SELECT * FROM kala ORDER BY kalaID DESC LIMIT 9";
            $setr = mysqli_query($conn, $setq);
            while ($setrow = mysqli_fetch_array($setr)) {
                print('<a href="product.php?kID='.$setrow['kalaID'].'">
                <div class="product">
                <img src="../project' . $setrow['image'] . '" width="400px" height="400px" style="margin:5px;" />
                <h2 style="color: #000;">' . $setrow['name'] . '</h2>
                <p>' . $setrow['price'] . '</p>
                <button>افزودن به سبد خرید</button>
                </div>
                </a>');

            }
            ?>



        </div>

    </section>







    <div id="footer">
        &copy; 2024 . تمامی حقوق محفوظ است. VIOLET SHOP
    </div>



</body>

</html>