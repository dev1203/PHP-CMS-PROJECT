 <?php
   global $connection;
    $query = "SELECT * FROM posts";

    $result = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="card mb-3">
            <h3 class="card-title"><?php echo $row['post_title'] ?><small> by <?php echo $row['post_author'] ?></small></h3>
            <span class="glyphicon glyphicon-comment"> <i><?php echo $row['post_comment_count'] ?></i> </span>

            <img class="card-img-top post-image" src="../Images/<?php echo $row['post_image'] ?>" alt="Card image cap">
            <div class="card-body">
                <p class="card-text"><?php echo $row['post_content'] ?></p>
                <p class="card-text"><small class="text-muted"><?php echo $row['post_date'] ?></small></p>
            </div>
        </div>
        <?php
    }
