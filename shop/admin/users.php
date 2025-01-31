<div class="row fw-bold">
    <div class="col-1">شماره</div>
    <div class="col-1">نام کاربری</div>
    <div class="col-1">نام</div>
    <div class="col-1">جنسیت</div>
    <div class="col-2">ایمیل</div>
    <div class="col-2">موبایل</div>
    <div class="col-2">آدرس</div>
    <div class="col-1">تاریخ ثبت نام</div>
    <div class="col-1">حذف</div>

</div>
<hr/>


<?php
    $conn = mysqli_connect("localhost" , "root" , "" , "myshop");
    mysqli_set_charset($conn , "utf8");
    if($conn)
    {
        $query = "SELECT * from user";

        $result=mysqli_query($conn , $query);
        while($row = mysqli_fetch_array($result))
        {
            print('

            <div class="row">
            
            <div class="col-1">'. $row['id'] .'</div>
            <div class="col-1">'. $row['username'] .'</div>
            <div class="col-1">'. $row['name'] .'</div>
            <div class="col-1">'. $row['jensiat'] .'</div>
            <div class="col-2">'. $row['email'] .'</div>
            <div class="col-2">'. $row['mobile'] .'</div>
            <div class="col-2">'. $row['address'] .'</div>
            <div class="col-1">'. $row['joinDate'] .'</div>
            <div class="col-1">
                <a href="../admin/submit-user-delete.php?userID='. $row['id'] .'">
                حذف
                </a>
            </div>

            </div>

            ');
        }
        
        
    }    
?>