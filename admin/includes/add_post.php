<?php  include "navigation_admin.php";?>
<?php

if(isset($_POST['add_post'])){
    $title = $_POST['title'];
    $author = $_POST['author'];

    $date = $_POST['date'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];

    $image = $_FILES['image']['name'];
    $temp_image= $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_image,"../Images/".$image);

    $query = "INSERT INTO posts (post_title,post_author,post_date,post_image,post_content,post_tags) VALUES ('$title','$author','$date','$image','$content','$tags')";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die(mysqli_error($connection));

    }
    else{
    echo '<div class="alert alert-success">You Post Has Been Added</div>';
    }
}

?>
<div class="container" id="content-page">
    <div class="row form-wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group" >
                <label for="title">Post Title</label>
                <input type="text" placeholder="Enter Title" name="title" class="form-control">

                <label for="author">Post Title</label>
                <input type="text" placeholder="Enter Author" name="author" class="form-control">

                <label for="date">Post Date</label>
                <input type="date" placeholder="Enter Title" name="date" class="form-control">

                <label for="date">Image</label>
                <input type="file" accept="image/*" class="form-control" name="image">

                <label for="date">Post Date</label>
                <textarea class="form-control text" placeholder="Enter Content" name="content"></textarea>

                <label for="tags">Post Tags</label>
                <input type="text" placeholder="Enter Title" name="tags" class="form-control">

                <button type="submit" class="btn btn-dark" name="add_post">Save</button>
            </div>
        </form>
    </div>
</div>

