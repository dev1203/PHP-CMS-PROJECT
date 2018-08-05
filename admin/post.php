<?php include "includes/header_admin.php" ?>
<?php include "controller.php/post_controller.php" ?>
<?php include "includes/navigation_admin.php"?>
        <?php
        if(isset($_GET)){
            if(!empty($_GET['source'])){
                $source = $_GET['source'];
                if($source==="add"){
                    post::add_post();
                }
                else if($source==="remove"){
                   post::remove_post($_GET['id']);
                }
                else if($source==="accept"){
                    $id =$_GET['id'];
                    $query = "UPDATE posts SET post_status = 'accepted' WHERE post_id='$id'";
                    $result = mysqli_query($connection, $query);
                    header("location:post.php");
                }

                else if($source==="edit"){
                    post::edit_post();
                }
            }
            else{
                post::print_post();
            }
        }
        ?>
<?php include "includes/footer_admin.php" ?>
