<div class="row fw-bold">
    <div class="col-1">شماره </div>
    <div class="col-2">نام</div>
    <div class="col-2">ایمیل</div>
    <div class="col-4">نظر</div>
    <div class="col-1">زمان</div>
    <div class="col-1">تایید</div>
    <div class="col-1">حذف</div>

</div>
<hr/>


<?php
    $conn = mysqli_connect("localhost" , "root" , "" , "myshop");
    mysqli_set_charset($conn , "utf8");
    if($conn)
    {
        $query = "SELECT * from comment";

        $result=mysqli_query($conn , $query);
        while($row = mysqli_fetch_array($result))
        {
            print('

            <div class="row">
            
            <div class="col-1">'. $row['commentID'] .'</div>
            <div class="col-2">'. $row['cname'] .'</div>
            <div class="col-2">'. $row['email'] .'</div>
            <div class="col-4">'. $row['comment'] .'</div>
            <div class="col-1">'. $row['submitDate'] .'</div>
            <div class="col-1"> <a href="submit-comment-approve.php?cID='. $row['commentID'] .'" >تایید </a></div>
            <div class="col-1"> <a href="submit-comment-delete.php?cID='. $row['commentID'] .'" >حذف </a></div>

            </div>

            ');
        }
        
        
    }    
?>