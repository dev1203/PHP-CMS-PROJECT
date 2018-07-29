<!--  Header  -->
<?php include "includes/header.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>

<?php
//This will get the post id and query the database to get the corresponding page.

if(isset($_GET['id'])){
    $post_id=$_GET['id'];
    $post_id = mysqli_real_escape_string($connection,$post_id);
    $query_post_with_id = "SELECT * FROM posts where ";
    $query_post_with_id .="post_id = '$post_id'";
    $result = mysqli_query($connection, $query_post_with_id);
    $row = mysqli_fetch_assoc($result);
    if(empty($row)){
        die(include "includes/404.php");
    }
    else{
//This function will take row as parameter and it will print all the data related to it on functions.php
        show_post($row);
    }
}
?>

<?php include "includes/sidebar.php";?>
    </div>
 <!-- /.row -->
<hr>
<?php include "includes/footer.php";?>
