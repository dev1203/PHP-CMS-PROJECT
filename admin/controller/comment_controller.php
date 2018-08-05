<?php

class comment{
    static function get_all_comment(){
        global $connection;
        $query_all_comments = "SELECT * FROM comments";
        $result_all_comments = mysqli_query($connection, $query_all_comments);
        return $result_all_comments;
    }

    static function print_all_comments(){
        global $connection;

        $result = comment::get_all_comment();
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="card category-card">
                <div class="card-body">
                    <h4><?php echo $row['comment_content'] ?><small> by <i><?php echo $row['comment_author'];?></i></small></h4>
                    <p>Post Commented on:
                        <?php
                        $relate_id=$row['comment_post_id'];
                        $relate_comment = "SELECT * FROM posts WHERE post_id ='$relate_id'";
                        $result_related = mysqli_query($connection,$relate_comment);
                        $resulted_row = mysqli_fetch_assoc($result_related);
                        $post_title = $resulted_row['post_title'];
                        $post_id = $resulted_row['post_id'];
                        echo "<a href='../post.php?id={$post_id}'>{$post_title}</a>";
                        ?>
                    </p>
                    <small><?php echo $row['comment_date'];?></small>
                    <?php if($row['comment_status']=='pending'){?>
                        <div>
                            <a href="comments.php?approve=<?php echo $row['comment_id'];?>"><button type="button" class="btn btn-success">Accept</button></a>

                        </div>
                    <?php }?>

                    <a class="right" href="comments.php?remove=<?php echo $row['comment_id']  ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
            </div>
            <?php
        }
    }
    static function remove_comment($id){
        global $connection;
        $id_to_delete = validate_query($id);
        $query_delete = "DELETE FROM comments WHERE comment_id='$id_to_delete'";
        $result_delete = mysqli_query($connection,$query_delete);
    }

    static function approve_comment($id_approve,$comment_id){
        global $connection;
        $id_approve=validate_query($id_approve);
        $comment_id=validate_query($comment_id);
        $approved="approved";
        $query_update = "UPDATE comments SET comment_status = '$approved' WHERE comment_id='$id_approve';";
        $result = mysqli_query($connection,$query_update);
        $update_comment_count = "UPDATE posts SET post_comment_count = post_comment_count +1 WHERE post_id = '$comment_id'";
        $result = mysqli_query($connection,$update_comment_count);
        if(!$result){
            die(mysqli_error($connection));
        }
        else {
            header("location:comments.php");
        }
    }

}
?>