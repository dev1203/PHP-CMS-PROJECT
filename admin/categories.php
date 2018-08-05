<?php include "includes/header_admin.php" ?>
<?php
if(isset($_POST["category_add"])){
    $category = $_POST["category_add"];
    if($category){
        $query_add_category = "INSERT INTO category (title) VALUES ('$category')";
        $result = mysqli_query($connection,$query_add_category);
        if($result){
            echo "yay";
        }
    }
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM category WHERE id = '$id'";
    $result = mysqli_query($connection,$query);
    header("Location:categories.php");
}

if (isset($_POST['update'])){
    $update = $_POST['update'];
    $id = $_POST['id'];
    if($update){
        $query = "UPDATE category SET title = '$update' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
    }
}
?>
    <?php include "includes/navigation_admin.php"; ?>
<div class="container black" id="content-page">

            <form method="post" action="categories.php">
                <div class="form-group">
                    <input class="form-control" placeholder="Enter Category" name="category_add">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>

        <?php
            update_category();
        ?>
            <?php
            print_all_categories();
            ?>
</div>
<?php include "includes/footer_admin.php" ?>
