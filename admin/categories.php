<?php include "../includes/db.php" ?>
<?php
if(isset($_POST["category"])){
    $category = $_POST["category"];
    global $connection;

    if($category){
        $query = "INSERT INTO category (title) VALUES ('$category')";
        $result = mysqli_query($connection,$query);
    }
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM category WHERE id = '$id'";
    $result = mysqli_query($connection,$query);
    header("Location:categories.php");
}
//if (isset($_POST['update'])){
//    $update = $_POST['update'];
//    if($update){
//        $query = "UPDATE category SET '$update' WHERE title = '$'"
//    }
//}
?>

<?php include "includes/header.php" ?>
    <div id="wrapper">
<?php include "includes/navigation.php"; ?>
        <div id="page-wrapper">
            <form method="post" action="categories.php">
                <div class="form-group">
                   <input class="form-control" placeholder="Enter Category" name="category">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
                <?php
               if(isset($_GET['edit'])){
                    $update = $_GET['edit'];
                    $query = "SELECT * FROM category WHERE id = '$update'";
                    $result = mysqli_query($connection,$query);
                    $row = mysqli_fetch_assoc($result);
                   ?>
               <form method="post" action="categories.php">
                <div class="form-group">
                    <input class="form-control" placeholder="Enter Category" name="update" value ="<?php echo($row['title'])?>">
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
                </form>
                <?php
                }

                ?>

            <div class="list-group" id="list-tab" role="tablist">
                <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <li class="list-group-item list-group-item-action" data-toggle="list" role="tab"><?php echo $row['title'] ?>
                        <a href="categories.php?delete=<?php echo $row['id'] ?>" class="glyphicon glyphicon-trash"></a>
                        <a href="categories.php?edit=<?php echo $row['id'] ?>" class="glyphicon glyphicon-edit"></a>
                    </li>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>
