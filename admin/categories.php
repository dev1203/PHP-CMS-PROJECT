<?php include "includes/header_admin.php" ?>
<?php include "controller/category_controller.php" ?>

<?php
if(isset($_POST["category_add"])){
    $category = $_POST["category_add"];
    if($category){
        category::add_category($category);
    }
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    category::delete_category($id);
    header("Location:categories.php");
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
        category::print_all_categories();
    ?>
</div>
<?php include "includes/footer_admin.php" ?>
