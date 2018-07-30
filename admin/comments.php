<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<?php
if(isset($_GET['approve'])){
    $id_approve = $_GET['approve'];
    $approved="approved";
    $query_update = "UPDATE comments SET comment_status = '$approved' WHERE comment_id='$id_approve';";
    $result = mysqli_query($connection,$query_update);
    header("location:comments.php");

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
                                $email = substr($row['comment_email'],0,10)."...";
                                $content = substr($row['comment_content'],0,14)."...";
                                echo "<td><a href='../post.php?id={$row['comment_post_id']}'>{$row['comment_post_id']}</a></td>";
                                echo "<td>{$row['comment_author']}</td>";
                                echo "<td>{$content}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$row['comment_date']}</td>";
                                echo "<td>{$row['comment_status']}</td>";
                                ?>
<!--                                <td>-->
<!--                                <a class="glyphicon glyphicon-remove" href="comments.php?remove=--><?php //echo$row["comment_id"];?><!--</a>-->
<!--                                </td>;-->

                                <?php
                                echo "</tr>";

                            }

                            ?>
                        </tr>
                    </table>
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
                                $email = substr($row['comment_email'],0,10)."...";
                                $content = substr($row['comment_content'],0,14)."...";
                                echo "<td><a href='../post.php?id={$row['comment_post_id']}'>{$row['comment_post_id']}</a></td>";
                                echo "<td>{$row['comment_author']}</td>";
                                echo "<td>{$content}</td>";
                                echo "<td>{$email}</td>";
                                echo "<td>{$row['comment_date']}</td>";
                                echo "<td>{$row['comment_status']}</td>";
                                ?>
                                <td>
                                   <a class="glyphicon glyphicon-ok approve" href="comments.php?approve=<?php echo$row['comment_id'];?>"></a>
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

