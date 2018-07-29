<?php
if(isset($_GET['source'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM posts where post_id = '$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
}
if(isset($_POST['update_post'])){
    $id = $_POST['update_post'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $category = $_POST['category_id'];
    $image = $_FILES['image']['name'];
    $temp_image= $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_image,"../Images/".$image);

    $query = "UPDATE posts SET post_title = '$title', post_author ='$author',post_date='$date',post_content='$content',post_tags='$tags', post_image = '$image' WHERE post_id = '$id'";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die(mysqli_error($connection));

    }
    else{
        echo '<div class="alert alert-success">You Post Has Been Updated</div>';
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" placeholder="Enter Title" name="title" class="form-control" value="<?php echo $row['post_title']?>">

        <label for="author">Post Title</label>
        <input type="text" placeholder="Enter Author" name="author" class="form-control" value="<?php echo $row['post_author']?>">

        <label for="date">Post Date</label>
        <input type="date" placeholder="Enter Title" name="date" class="form-control" value="<?php echo $row['post_date']?>>

        <label for="card-img-top">Image</label>
        <img src="../Images/<?php echo $row['post_image'];?>" class="card-img-top post-image">
        <input type="file" accept="image/*" class="form-control" name="image" >

        <label for="date">Post Date</label>
        <textarea class="form-control text" placeholder="Enter Content" name="content"><?php echo $row['post_content']?></textarea>

        <label for="tags">Post Tags</label>
        <input type="text" placeholder="Enter Title" name="tags" class="form-control" value="<?php echo $row['post_tags']?>">

        <label for="tags">Post Category</label>
        <select class="form-control" value="category_id">
            <?php
            global $connection;
            $update = $_GET['edit'];
            $query = "SELECT * FROM category";
            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($result)){
             echo "<option value ='{$row['id']}'>{$row['title']}</option>";
            }
            ?>
        </select>

        <button type="submit" class="btn btn-dark" name="update_post" value="<?php echo $row['post_id'] ?>">Save</button>
    </div>
</form>
