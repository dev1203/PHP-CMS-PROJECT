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

<?php
function print_query($result){
    ?>
    <div class="col-md-8">
        <?php
        while($row = mysqli_fetch_assoc($result)){
            $post_id=$row['post_id'];
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
  <?php } ?>
    </div>
<?php } ?>

<?php include "includes/footer.php"; ?>
