<?php

$search=$_POST['search'];

$conn = mysqli_connect("localhost", "root", "", "myshop");
        mysqli_set_charset($conn, "utf8");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جستجوی محصولات</title>

    <link href="files/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="files/css/cat-list.css" type="text/css" rel="stylesheet" />
    <script src="files/js/bootstrap.bundle.min.js"></script>


    <style>
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
    </style>
</head>

<body>

    <header>

        <div id="header">
            <img src="files/images/cover.jpg" />
        </div>



    </header>

    <section>

    <div class=" p_0 container-right">
        <?php
        $query = "SELECT * from kala  where name like '%$search%' ";
        $result = mysqli_query($conn, $query);
        while ($setrow = mysqli_fetch_array($result)) 
                            {
                                print('<a href="product.php?kID=' . $setrow['kalaID'] . '">
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