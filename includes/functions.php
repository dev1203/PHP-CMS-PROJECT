<?php
//This function will print all the posts on the homepage
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
            <?php } ?>
    </div>
    <?php
}
//_-----------------------------------------------------------------------------

//This will print the post when clicked on post.php
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
//_-----------------------------------------------------------------------------
function get_categories(){
    global $connection;
    $query_categories = "SELECT * FROM category LIMIT 6";
    $query_categories = mysqli_escape_string($connection,$query_categories);
    $result = mysqli_query($connection,$query_categories);
    return $result;
}
?>