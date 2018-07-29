<!--  Header  -->
<?php include "includes/header.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>

<?php
//This will get the post id and query the database to get the corresponding page.

if(isset($_GET['id'])){
    $post_id=$_GET['id'];
    $post_id = mysqli_real_escape_string($connection,$post_id);
    $query_post_with_id = "SELECT * FROM posts where ";
    $query_post_with_id .="post_id = '$post_id'";
    $result = mysqli_query($connection, $query_post_with_id);
    $row = mysqli_fetch_assoc($result);
    if(empty($row)){
        die(include "includes/404.php");
    }
    else{
//This function will take row as parameter and it will print all the data related to it on post.php
        show_post($row);
    }
}

?>
<?php
function show_post($row){
    ?>
<div class="container">

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <!-- Blog Post -->

            <!-- Title -->
            <h1><?php echo $row['post_title'];?></h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#"><?php echo $row['post_author'];?></a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'];?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-responsive" src="Images/<?php echo $row['post_image'];?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php echo $row['post_content'];?></p>


            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    <!-- Nested Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Nested Start Bootstrap
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>
<?php
}
?>
<?php include "includes/sidebar.php";?>
    </div>
 <!-- /.row -->
<hr>
<?php include "includes/footer.php";?>
