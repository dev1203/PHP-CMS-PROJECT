<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<?php
if(isset($_GET['approve'])){
    comment::approve_comment( $id_approve = $_GET['approve'],$comment_id=$_GET['post']);
}
if(isset($_GET['remove'])){
    comment::remove_comment($_GET['remove']);
    header("location:comments.php");
}
comment::print_all_comments();
?>
<?php include "includes/footer_admin.php" ?>

