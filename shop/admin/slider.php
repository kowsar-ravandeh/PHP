<div class="row fw-bold">
    <div class="col-1">شماره</div>
    <div class="col-2">اسلاید</div>
    <div class="col-2">توضیحات</div>
    <div class="col-1">لینک</div>
    <div class="col-1">حذف</div>
    <div class="col-5">اسلاید جدید</div>

</div>
<hr />

<div class="row fw-bold">

<div class="col-7">


    <?php
    $conn = mysqli_connect("localhost", "root", "", "myshop");
    mysqli_set_charset($conn, "utf8");
    if ($conn) {
        $query = "SELECT * from slider ";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            print('

            <div class="row">
            
            <div class="col-1">' . $row['id'] . '</div>
            <div class="col-4"><img src="' . $row['src'] . '" width="100px" height="50px" /></div>
            <div class="col-3">' . $row['description'] . '</div>
            <div class="col-2">' . $row['link'] . '</div>
            <div class="col-2">
                <a href="../admin/submit-slide-delete.php?sID=' . $row['id'] . '"> حذف </a>
            </div>

            

            </div>

            ');
        }
    }
    ?>

</div>



    <div class="col-5">


        <form method="post" action="submit-slide.php" enctype="multipart/form-data">

            <div>
                <input type="file" name="slideimg" />
            </div>

            <div>
                <input type="text" name="link" placeholder="لینک" />
            </div>

            <div>
                <textarea name="slideDesc" placeholder="توضیحات " rows="5" cols="20">

            </textarea>
            </div>

            <div>
                <input type="submit" value="ثبت " />
            </div>

        </form>

    </div>

</div>