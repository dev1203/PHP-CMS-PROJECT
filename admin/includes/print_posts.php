 <?php

   global $connection;
    $query = "SELECT * FROM posts";

    $result = mysqli_query($connection,$query);
    ?>
<div class="container">
<?php
    while($row = mysqli_fetch_assoc($result)){
        ?>
    <div class="row">
    <div class="col col-sm-2"></div>
    <div class="col col-sm-10">
        <div class="card mb-3">
            <img class="card-img-top post-image" src="../Images/<?php echo $row['post_image'] ?>" alt="Card image cap">
            <div class="card-body">
                 <h5 class="card-title"><?php echo $row['post_title'] ?><small> by <?php echo $row['post_author'] ?></small></h5>
                 <p class="card-text"><?php echo $row['post_content'] ?></p>
                 <p class="card-text"><small class="text-muted"><?php echo $row['post_date'] ?></small></p>
            </div>
            <span>
                <a class="glyphicon glyphicon-pencil delete_post" href="post.php?source=edit&id=<?php echo $row['post_id']?>"></a>
                <a class="glyphicon glyphicon-trash delete_post" href="post.php?source=remove&id=<?php echo $row['post_id']?>"></a>
            </span>
        </div>
    </div>
<?php
    }
?>
</div>


