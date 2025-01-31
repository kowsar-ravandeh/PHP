<div class="row fw-bold">
    <div class="col-1">شماره</div>
    <div class="col-2">تصویر کالا</div>
    <div class="col-4">نام کالا</div>
    <div class="col-3">دسته بندی</div>
    <div class="col-1">قیمت</div>
    <div class="col-1">ویرایش</div>

</div>
<hr/>


<?php
    $conn = mysqli_connect("localhost" , "root" , "" , "myshop");
    mysqli_set_charset($conn , "utf8");
    if($conn)
    {
        //برای دریافت نام دسته بندی جدول کالا و دسته بندی را جوین می زنیم و شماره دسته بندی را با هم مقایسه می کنیم تا اطلاعات با هم تطبیق داده شوند
        $query = "SELECT kalaID,name,price,image,categoryName from kala k ,category c where k.category = c.categoryID and userID =  ".$_SESSION['USER_ID'] ;

        $result=mysqli_query($conn , $query);
        while($row = mysqli_fetch_array($result))
        {
            print('

            <div class="row">
            
            <div class="col-1">'. $row['kalaID'] .'</div>
            <div class="col-2">  <img src="..'. $row['image'] .'" width="50px" height="50px" />  </div>
            <div class="col-4">'. $row['name'] .'</div>
            <div class="col-3">'. $row['categoryName'] .'</div>
            <div class="col-1">'. $row['price'] .'</div>
            <div class="col-1">
                <a href="../admin/?page=editkala&kID='.$row['kalaID'].'">
                <img src="../files/images/icon/edit.png"  width="35px" height="35px" />
                </a>
            </div>

            </div>

            ');
        }
        
        
    }    
?>