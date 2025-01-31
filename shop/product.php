<?php
if (isset($_GET['kID']))
    $id = $_GET['kID'];
else exit("کالا وجود ندارن");


$conn = mysqli_connect("localhost", "root", "", "myshop");
mysqli_set_charset($conn, "utf8");
if ($conn) {

    $query = "SELECT kalaID,name,price,image,description from kala  where kalaID=$id";

    $result = mysqli_query($conn, $query);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIOLET SHOP</title>

    <link href="files/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <script src="files/js/bootstrap.bundle.min.js"></script>


    <style>
        body {
            background-color: #f5dff2;
            font-family: B Kamran Bold;
        }

        .top {
            height: 550px;
            width: 92%;
            border: thin solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            margin: 0 auto;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 25px;
        }

        .bottom {
            height: 500px;
            width: 92%;
            border: thin solid #ccc;
            border-radius: 10px;
            background-color: #fff;
            margin: 0 auto;
            padding: 25px;
            direction: rtl;
        }

        .bleft {
            width: 35%;
            text-align: right;
            float: left;
            margin-left: 20px;
        }

        .bright {
            width: 55%;
            text-align: center;
        }

        input {
            width: 100%;
            height: 35px;
            border: solid thin #ccc;
            border-radius: 10px;
            margin: 10px;
        }

        textarea {
            max-width: 100%;
            max-height: 200px;
            width: 100%;
            height: 60px;
            border: solid thin #ccc;
            border-radius: 10px;
            margin: 10px;
        }

        .submit {
            background-color: #9b0086;
            border: none;
            color: #fff;
            cursor: pointer;
            text-align: center;
        }

        button {
            background-color: #9b0086;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            display: block;
            margin-bottom: 30px;
            margin-right: 190px;
            padding: 8px 10px;
            width: 40%;
            font-family: B Kamran Bold;
            font-size: 20px;
            float: right;
        }

        button:hover {
            background-color: #b00198;
        }
    </style>


</head>

<body>

    <div class="top">

        <div class="row">

            <div class="col-6"> </div>
            <div class="col-2">نام کالا</div>
            <div class="col-1">قیمت</div>
            <div class="col-3">توضیحات</div>

        </div>
        <hr />


        <div class="ltop">
            <?php
            if ($conn) {
            while ($row = mysqli_fetch_array($result)) {
                print('
                    <div class="row">

                    <div class="col-6">  <img src="../project' . $row['image'] . '" width="400px" height="400px" />  </div>
                    <div class="col-2">' . $row['name'] . '</div>
                    <div class="col-1">' . $row['price'] . '</div>
                    <div class="col-3">' . $row['description'] . '</div>

                    </div>
            ');
            }
        }
            ?>
            <button>افزودن به سبد خرید</button>
        </div>



    </div>



    <div class="bottom">
        <div class="bleft">
            <form method="post" action="submit-comment.php">

                <input type="hidden" name="kID" value="<?php print($_GET['kID']); ?>" />
                <input type="text" name="name" placeholder="نام" />
                <input type="text" name="email" placeholder="ایمیل" />
                <textarea name="comment"></textarea>
                <input type="submit" value="ثبت نظر" class="submit" />

            </form>
        </div>
        <div class="bright">

            <div>
                <div class="row">

                    <div class="col-2">نام</div>
                    <div class="col-3">ایمیل</div>
                    <div class="col-2">تاریخ ثبت نظر</div>
                    <div class="col-5">نظر</div>

                </div>
            </div>

            <hr />
            <div>
                <?php
                if ($conn) {
                    $quer = "SELECT * from comment where kID=$id";

                    $resul = mysqli_query($conn, $quer);
                    while ($rows = mysqli_fetch_array($resul)) {
                        print('

            <div class="row">
            
            <div class="col-2">' . $rows['cname'] . '</div>
            <div class="col-3">' . $rows['email'] . '</div>
            <div class="col-2">' . $rows['submitDate'] . '</div>
            <div class="col-5">' . $rows['comment'] . '</div>

            </div>

            ');
                    }
                }
                ?>
            </div>
        </div>


    </div>




</body>

</html>