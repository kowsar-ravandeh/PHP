<form method="post" action="submit-newkala.php" enctype="multipart/form-data">

<div>
    <input type="text" name="kalaName" placeholder="نام کالا ..."/>
</div>

<div>
    <textarea name="kalaDesc" placeholder="توضیحات کالا" rows="5" cols="20">

    </textarea>
</div>

<div>
    <input type="number" name="kalaPrice" />
</div>

<div>
    <select name="category">
<?php
//دریافت دسته بندی ها از پایگاه داده
$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn , "utf8");
if($conn)
{
    $query = "select * from category order by categoryName asc " ;
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

<div>
    <input type="file" name="kalaImage"/>
</div>

<div>
    <input type="submit" value="ثبت کالا" />
</div>

</form>