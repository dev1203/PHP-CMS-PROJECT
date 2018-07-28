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
            <div class="list-group" id="list-tab" role="tablist">
                <?php
                $query = "SELECT * FROM category";
                $result = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <li class="list-group-item list-group-item-action" data-toggle="list" role="tab"><?php echo $row['title'] ?><a href="categories.php?delete=<?php echo $row['id'] ?>" class="glyphicon glyphicon-trash"></a></li>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php include "includes/footer.php" ?>
