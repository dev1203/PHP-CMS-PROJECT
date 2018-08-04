<?php include "includes/navigation_admin.php"; ?>
<div class="container" id="content-page">
    <?php
    $query_get_all_posts = "SELECT * FROM posts";
    $result_all_posts = mysqli_query($connection,$query_get_all_posts);
    while($row = mysqli_fetch_assoc($result_all_posts)){
        ?>
        <div class="card mb-3">
            <a class="eye" href="../post.php?id=<?php echo $row['post_id'];?>"><i class="fa fa-eye"></i></a>
            <img class="card-img-top post-image" src="../Images/<?php echo $row['post_image']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['post_title']?></h5>
                <p class="card-text"><?php echo $row['post_content']?></p>
                <p class="card-text"><small class="text-muted"><?php echo $row['post_date']?></small></p>
            </div>
            <hr>
            <div class="container">
                <a class="delete_post" href="post.php?source=edit&id=<?php echo $row['post_id'];?>"><button type="button" class="btn margin btn-primary col-sm-2"><i class="fa fa-edit"></i></button></a>
                <a class="delete_post" href="post.php?source=remove&id=<?php echo $row['post_id'];?>"><button type="button" class="btn margin btn-danger col-sm-2"><i class="fa fa-trash-o"></i></button></a>
            </div>
        </div>
    <?php
    }
    ?>

</div>