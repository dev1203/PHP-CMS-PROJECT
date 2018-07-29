<!--  Header  -->
<?php include "includes/header.php"; ?>

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
            if(isset($_GET['category'])){
                $id=$_GET['category'];
                $query = "SELECT * FROM posts WHERE post_category_id = '$id'";
                $result = mysqli_query($connection,$query);
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
<!--<div class="row">-->
<!--    <div class="col-md-8">-->
<!--        <h1>Hello world</h1>-->
<!--    </div>-->
<!--</div>-->
    <!-- /.row -->
    <hr>

<?php include "includes/footer.php" ?>


