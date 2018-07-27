<!--  Header and Database   -->
<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
            <?php
            $query = "SELECT * FROM posts";
            $result = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($result)){
                $title = $row["post_title"];
                $author = $row["post_author"];
                $date = $row["post_date"];
                $image = $row["post_image"];
                $content = $row["post_content"];
                $tags= $row["post_tags"];
                ?>
                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $title ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php  echo $author ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span><?php echo " ".$date ?></p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                    <hr>
                    <p><?php  echo $content ?></p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                <?php
            }
            ?>
            </div>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>

<?php
include "includes/footer.php";
?>



<!---->
<!--        <!-- Pager -->-->
<!--        <ul class="pager">-->
<!--            <li class="previous">-->
<!--                <a href="#">&larr; Older</a>-->
<!--            </li>-->
<!--            <li class="next">-->
<!--                <a href="#">Newer &rarr;</a>-->
<!--            </li>-->
<!--        </ul>-->
