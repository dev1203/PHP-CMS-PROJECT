<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<div id="wrapper">
    <div id="page-wrapper">
        <?php
        if(isset($_GET)){
            if(!empty($_GET['source'])){
                $source = $_GET['source'];
                if($source==="add"){
                    ?>
                    <h1 class="page-header container-fluid">Add Post</h1>
                    <?php

                    include "./includes/add_post.php";
                }
                else if($source==="remove"){

                    include "./includes/remove_post.php";
                }
                else if($source==="edit"){
                    ?>
                    <h1 class="page-header">Edit Post</h1>
                <?php
                    include "./includes/edit_post.php";

                }
            }
            else{
                ?>
                <h1 class="page-header">All Posts</h1>
                <a type="button" class="btn-add" href="post.php?source=add">All Post</a>
                <?php
                include "./includes/print_posts.php";
            }
        }
        ?>
    </div>
</div>

<?php include "includes/footer_admin.php" ?>
