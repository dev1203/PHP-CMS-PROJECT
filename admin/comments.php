<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<?php
if(isset($_GET['approve'])){
    $id_approve = $_GET['approve'];
    $approved="approved";
    $comment_id=$_GET['post'];
    $query_update = "UPDATE comments SET comment_status = '$approved' WHERE comment_id='$id_approve';";
    $result = mysqli_query($connection,$query_update);
    $update_comment_count = "UPDATE posts SET post_comment_count = post_comment_count +1 WHERE post_id = '$comment_id'";
    $result = mysqli_query($connection,$update_comment_count);
    if(!$result){
        die(mysqli_error($connection));
    }
    else {
//        header("location:comments.php");
    }
}
if(isset($_GET['remove'])){
    $id_approve = $_GET['remove'];
    $query_update = "DELETE FROM comments WHERE comment_id='$id_approve'";
    $result = mysqli_query($connection,$query_update);
    header("location:comments.php");

}
?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="container-fluid">
                    <h1>Approved Comments</h1>
                    <table class="table table-hover">
                        <tr>
                            <th>Comment Post ID</th>
                            <th>Comment Author</th>
                            <th>Comment Content</th>
                            <th>Author's Email</th>
                            <th>Comment Date</th>
                            <th>Comment Status</th>
                            <th>Action</th>

                        </tr>
                        <tr>
                            <?php
                            $query = "SELECT * FROM comments WHERE comment_status LIKE '%approved%'";
                            $result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                if(strlen($row['comment_email'])>10){
                                    $email = substr($row['comment_email'],0,10)."...";
                                }
                                else{
                                    $email = $row['comment_email'];
                                }
                                if(strlen($row['comment_content'])>10){
                                    $content = substr($row['comment_content'],0,10)."...";
                                }
                                else{
                                    $content =$row['comment_content'];

                                }

                                echo "<td><a href='../post.php?id={$row['comment_post_id']}'>{$row['comment_post_id']}</a></td>";
                                echo "<td>{$row['comment_author']}</td>";
                                echo "<td>{$content}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$row['comment_date']}</td>";
                                echo "<td>{$row['comment_status']}</td>";
                                $id = $row['comment_id'];
                                echo "<td><a class='glyphicon glyphicon-remove' href='comments.php?remove={$id}'</a></td>";
                                }
                                ?>
                                </tr>

                        </tr>
                    </table>

                    <h1>Pending Comments</h1>

                    <table class="table table-hover">
                        <tr>
                            <th>Comment Post ID</th>
                            <th>Comment Author</th>
                            <th>Comment Content</th>
                            <th>Comment's post</th>
                            <th>Comment Date</th>
                            <th>Comment Status</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <?php
                            $query = "SELECT * FROM comments WHERE comment_status LIKE '%pending%'";
                            $result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                if(strlen($row['comment_email'])>10){
                                    $email = substr($row['comment_email'],0,10)."...";
                                }
                                else{
                                    $email = $row['comment_email'];
                                }
                                if(strlen($row['comment_content'])>10){
                                    $content = substr($row['comment_content'],0,10)."...";
                                }
                                else{
                                    $content =$row['comment_content'];

                                }
                                echo "<td><a href='../post.php?id={$row['comment_post_id']}'>{$row['comment_post_id']}</a></td>";
                                echo "<td>{$row['comment_author']}</td>";
                                echo "<td>{$content}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$row['comment_date']}</td>";
                                echo "<td>{$row['comment_status']}</td>";
                                ?>
                                <td>
                                   <a class="glyphicon glyphicon-ok approve" href="comments.php?approve=<?php echo$row['comment_id'];?>&post=<?php echo $row['comment_post_id'];?>"></a>
                                    <a class="glyphicon glyphicon-remove" href="comments.php?remove=<?php echo$row['comment_id'];?>"></a>

                                </td>

                            <?php
                                echo "</tr>";
                            }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "includes/footer_admin.php" ?>

