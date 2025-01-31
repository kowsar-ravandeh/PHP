<?php
$catName = $_POST['catName'];
$catParent = $_POST['catParent'];

$conn = mysqli_connect("localhost" , "root" , "" , "myshop");
mysqli_set_charset($conn, "utf8");
if($conn)
{
    if(isset($_POST['newCategory']))
        $query = "INSERT INTO category ( categoryName, parentID)  VALUES ( '$catName', '$catParent') ";
    else if(isset($_POST['deleteCategory']))
    {
        $catIDToDelete = $_POST['catIDToDelete'];
        $query = "delete from category where categoryID = $catIDToDelete";
    }

    else if(isset($_POST['editCategory']))
    {
        $editcatID = $_POST['editcatID'];
        $editCatName = $_POST['editCatName'];
        $editCatParent = $_POST['editCatParent'];

        if(empty($editCatName) && $editCatParent == -1)
        {
            //بدون تغییر
            exit(header("Location: ../admin/?page=category"));
        }
        else if(empty($editCatName) && $editCatParent != -1)
        {
            //فقط والد تغییر کند
            $query = "UPDATE category SET parentID = '$editCatParent' WHERE categoryID = $editcatID ";
        }
        else if(!empty($editCatName) && $editCatParent == -1)
        {
            //فقط نام دسته بندی تغییر کند
            $query = "UPDATE category SET categoryName = '$editCatName' WHERE categoryID = $editcatID ";
        }
        else
        {
            //هر دو تغییر کنند
            $query = "UPDATE category SET categoryName = '$editCatName' , parentID = '$editCatParent' WHERE categoryID = $editcatID ";
        }
    }

//print($query);
    if(mysqli_query($conn , $query))
    {
        header("Location: ../admin/?page=category");
    }
    else 
    {
        exit("خطا در ثبت اطلاعات");
    }

}
else print("failed to connect database!");
?>