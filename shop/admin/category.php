<form method="post" action="submit-category.php">


<p>اضافه کردن دسته بندی</p>

<div>  <input type="text" name="catName" placeholder="نام دسته بندی" />  </div>

<div>
    <select name="catParent">
        <option value="0">دسته اصلی</option>


<?php
//دریافت دسته بندی ها از پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");
if($conn)
{
    $query = "SELECT * from category order by categoryName asc " ;
    $result=mysqli_query($conn , $query);
    while($row = mysqli_fetch_array($result))
    {
        $catID = $row['categoryID'];
        $catName = $row['categoryName'];
        print("<option value='$catID'>$catName</option>");
    }

}    
?>


        <!-- <option value="1">الکتریکی</option>
        <option value="2">پوشاک</option>
        <option value="3">غذا و خوراکی</option>
        <option value="4">موبایل</option>
        <option value="5">نوشیدنی</option> -->
    </select>
</div>

<div>  <input type="submit" name="newCategory" value="ثبت دسته بندی" />  </div>

<hr/>

<p> حذف دسته بندی</p>

<div> 
<div>
    <select name="catIDToDelete">
        <?php
        if($conn)
        {
            $query = "SELECT * from category order by categoryName asc " ;
            $result=mysqli_query($conn , $query);
            while($row = mysqli_fetch_array($result))
            {
                $catID = $row['categoryID'];
                $catName = $row['categoryName'];
                print("<option value='$catID'>$catName</option>");
            }
        
        }    
        ?>
    </select>
</div>
     <input type="submit" name="deleteCategory" value="حذف دسته بندی" /> 
    
</div>









<hr/>

<p> ویرایش دسته بندی</p>

<div>
    <select name="editcatID">
    <?php
        if($conn)
        {
            $query = "SELECT * from category order by categoryName asc " ;
            $result=mysqli_query($conn , $query);
            while($row = mysqli_fetch_array($result))
            {
                $catID = $row['categoryID'];
                $catName = $row['categoryName'];
                print("<option value='$catID'>$catName</option>");
            }
        
        }    
        ?>
    </select>
</div>

<div>  <input type="text" name="editCatName" value="نام جدید دسته بندی" />  </div>

<div>
    <select name="editCatParent">
        <option value="-1">بدون تغییر والد</option>
        <option value="0">دسته اصلی</option>
        <?php
        if($conn)
        {
            $query = "SELECT * from category order by categoryName asc " ;
            $result=mysqli_query($conn , $query);
            while($row = mysqli_fetch_array($result))
            {
                $catID = $row['categoryID'];
                $catName = $row['categoryName'];
                print("<option value='$catID'>$catName</option>");
            }
        
        }    
        ?>
    </select>
</div>

<div>  <input type="submit" name="editCategory" value="ویرایش دسته بندی" />  </div>


</form>