<?php

if(isset($_GET['kID']))
{
    $kalaID = $_GET['kID'];
}
else exit(header("Location: ../admin/?page=listkala"));

    $conn = mysqli_connect("localhost" , "root" , "" , "myshop");
    mysqli_set_charset($conn , "utf8");
    if($conn)
    {
        $query = "SELECT kalaID,name,description,price,image,categoryName 
        from kala k ,category c 
        where k.category = c.categoryID and userID = ".$_SESSION['USER_ID']." and kalaID = $kalaID " ;
        //exit($query);

        $result=mysqli_query($conn , $query);

        if(mysqli_num_rows($result) == 0)
        {
            exit("اجازه دسترسی به کالای وارد شده وجود ندارد.");
        }
    
        $kalaInfo = mysqli_fetch_array($result);
    }    

?>        







<form method="post" action="submit-editkala.php" enctype="multipart/form-data" align="center">

<!-- برای حذف یا ویرایش کالا نیاز به id داریم که در ورودی از نوع hidden ذخیره می کنیم -->
<input type="hidden" name="kalaID" value="<?php print($kalaID) ?>" />

<div>
    <input type="text" name="kalaName" placeholder="نام کالا ..." value="<?php print($kalaInfo["name"]); ?>"/>
</div>

<div>
    <textarea name="kalaDesc" placeholder="توضیحات کالا" rows="5" cols="20">
    <?php print($kalaInfo["description"]); ?>
    </textarea>
</div>

<div>
    <input type="number" name="kalaPrice" value="<?php print($kalaInfo["price"]); ?>" />
</div>

<div>
    <select name="category">
<?php

    $query = "select * from category order by categoryName asc " ;
    $result=mysqli_query($conn , $query);
    while($row = mysqli_fetch_array($result))
    {
        $catID = $row['categoryID'];
        $catName = $row['categoryName'];

        //در صورتی که دسته بندی کالا با دسته بندی نمایش داده شده از لیست یکی باشد به عنوان دسته بندی انتخاب شده کالا نمایش دهد 
        if($row['categoryName'] == $kalaInfo["categoryName"])
            print("<option value='$catID' selected>$catName</option>");
        else print("<option value='$catID'>$catName</option>");
    }
 
?>
    </select>
</div>

<div>
<div><img src=" ..<?php print($kalaInfo["image"]); ?>"  width="200px"  height="auto"/> </div>

<input type="hidden" name="oldimage" value="<?php print($kalaInfo["image"]); ?>" />

    <input type="file" name="kalaImage"/>
</div>

<div>
    <input type="submit" name="editkala" value="ویرایش کالا" />
</div>
<div>
    <input type="submit" name="deletekala" value="حذف کالا" />
</div>


</form>