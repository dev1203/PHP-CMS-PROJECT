<?php include "includes/navigation_admin.php"; ?>
<div class="container" id="content-page">
    <?php
    $query_get_all_posts = "SELECT * FROM posts";
    $result_all_posts = mysqli_query($connection,$query_get_all_posts);
    while($row = mysqli_fetch_assoc($result_all_posts)){
        ?>
        <div class="card mb-3">
            <a class="eye" href="#"><i class="fa fa-eye"></i></a>
            <img class="card-img-top post-image" src="../Images/<?php echo $row['post_image']?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['post_title']?></h5>
                <p class="card-text"><?php echo $row['post_content']?></p>
                <p class="card-text"><small class="text-muted"><?php echo $row['post_date']?></small></p>
            </div>
            <hr>
            <div class="container">
                <button type="button" class="btn margin btn-primary col-sm-2"><a><i class="fa fa-edit"></i></a></button>
                <button type="button" class="btn margin btn-danger col-sm-2"><a><i class="fa fa-trash-o"></i></a></button>
            </div>
        </div>
    <?php
    }
    ?>

</div>