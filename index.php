<!--  Header and Database   -->
<?php include "includes/header.php"; ?>
<?php include "includes/db.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
           <div class="col-md-8">
               <h1 class="page-header">
                   Blogify
                   <small>Computer Science Posts <small>by professionals</small></small>
               </h1>
           </div>

            <?php
            $query = "SELECT * FROM posts";
            $result = mysqli_query($connection,$query);
            print_query($result);
            ?>

            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
<?php
function print_query($result){
    ?>
    <div class="col-md-8">
<?php
    while($row = mysqli_fetch_assoc($result)){
        $post_id = $row["post_id"];
        $title = $row["post_title"];
        $author = $row["post_author"];
        $date = $row["post_date"];
        $image = $row["post_image"];
        $content = $row["post_content"];
        $tags= $row["post_tags"];
        ?>
        <h2>
            <a href="post.php?id=<?php echo $post_id ?>"><?php echo $title ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php  echo $author ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span><?php echo " ".$date ?></p>
        <hr>
        <img class="img-responsive" src="./Images/<?php echo $image?>" alt="">
        <hr>
        <p><?php  echo $content ?></p>
        <a class="btn btn-primary" href="post.php?id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
        <hr>
        <?php
    }
    ?>
    </div>
        <?php
}
?>
<?php include "includes/footer.php"; ?>
