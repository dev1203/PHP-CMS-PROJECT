<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"?>
<?php
//checking if the page has been requested
if(isset($_GET)){
    //Checking the source if it is empty or not
    if(!empty($_GET['source'])){
        $source = $_GET['source'];

    //Add will be redirected to /controller/post_controller.php

        if($source==="add"){
            post::add_post();
        }

    //Remove will be redirected to /controller/post_controller.php

        else if($source==="remove"){
           post::remove_post($_GET['id']);
        }

    //Accepting a post will be redirected to /controller/post_controller.php

        else if($source==="accept"){
            post::approve_post($_GET['id']);
            header("location:post.php");
        }

    //Edit will be redirected to /controller/post_controller.php

        else if($source==="edit"){
            post::edit_post();
        }
    }

    //Printing will be redirected to /controller/post_controller.php

    else{
        post::print_post();
    }
}
?>
<?php include "includes/footer_admin.php" ?>
