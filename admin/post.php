<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<div id="wrapper">
    <div id="page-wrapper">
        <h1 class="page-header">Add Posts</h1>
        <?php
        if(isset($_GET)){
            if(!empty($_GET['add'])){
                $source = $_GET['add'];
                if($source==="post"){
                    ?>
                    <a type="button" class="btn-add" href="post.php">Back</a>

                    <?php
                    include "./includes/add_post.php";
                }
            }
            else{
                ?>
                <a type="button" class="btn-add" href="post.php?add=post">Add Post</a>
                <?php
                include "./includes/print_posts.php";
            }
        }
        ?>
    </div>
</div>

<?php include "includes/footer_admin.php" ?>
