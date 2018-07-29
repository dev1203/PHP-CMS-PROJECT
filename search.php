<!--  Header  -->
<?php include "includes/header.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>

<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h2 class="page-header">
                Your Search Matches with following results.
            </h2>
        </div>
            <?php
            if(isset($_POST['search_post_with_tags'])){
                $search_tags = $_POST['search_post_with_tags'];
                $search_tags = mysqli_real_escape_string($connection,$search_tags);
                $query_tags = "SELECT * FROM posts WHERE ";
                $query_tags .= "post_tags LIKE '%$search_tags%'";
                $result = mysqli_query($connection,$query_tags);
                if(mysqli_num_rows($result)==0) {
                    die(include "includes/noresults.php");
                }
                else{
                    print_query($result);
                }
            }
            ?>
        <!-- Blog Sidebar Widgets Column -->
        <?php  include "includes/sidebar.php";?>
    </div>
    <!-- /.row -->
    <hr>
<?php include "includes/footer.php"; ?>
