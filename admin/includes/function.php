<?php
if(isset($_POST["category"])){
    $category = $_POST["category"];
    global $connection;

    if($category){
        $query = "INSERT INTO category (title) VALUES ('$category')";
        $result = mysqli_query($connection,$query);
    }
}

if (isset($_POST['update'])){
    $update = $_POST['update'];
    $id = $_POST['id'];
    if($update){
        $query = "UPDATE category SET title = '$update' WHERE id='$id'";
        $result = mysqli_query($connection, $query);
    }
}
function print_all_categories(){
    global $connection;
    $query = "SELECT * FROM category";
    $result = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card category-card">
            <div class="card-body">
                <?php echo $row['title'] ?>
                <a class="right" href="categories.php?delete=<?php echo $row['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>

            </div>
        </div>
        <?php
    }
}
function update_category(){
    if(isset($_GET['edit'])){
        global $connection;
        $update = $_GET['edit'];
        $query = "SELECT * FROM category WHERE id = '$update'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <form method="post" action="categories.php">
            <div class="form-group">
                <input class="form-control" placeholder="Enter Category" name="update" value ="<?php echo($row['title'])?>">
                <button class="btn btn-primary" type="submit" name = "id" value="<?php echo $row['id'] ;?>" >Update</button>
            </div>
        </form>
        <?php
    }
}

?>

