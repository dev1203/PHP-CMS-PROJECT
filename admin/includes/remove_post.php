<?php


if(isset($_GET['source'])){
    $id = $_GET['id'];
    $image = "SELECT * FROM posts WHERE post_id = '$id'";
    $result = mysqli_query($connection,$image);
    $filename=mysqli_fetch_assoc($result)['post_image'];
    unlink("../Images/".$filename);
    $query = "DELETE FROM posts where post_id ='$id'";
    $result = mysqli_query($connection,$query);

    if(!$result){
        die(mysqli_error($connection));
    }
    else{
        echo '<div class="alert alert-success">You Post Has Been Deleted</div>';
    }
}



?>