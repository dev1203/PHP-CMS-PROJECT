<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>

<?php
if(isset($_GET['remove_user'])){
    $id_to_remove = $_GET['remove_user'];
    $user_to_remove = "DELETE FROM users where user_id = '$id_to_remove'";
    $result = mysqli_query($connection, $user_to_remove);
    header('location:users.php');
}

$get_all_users = "SELECT * FROM users";
$result_all_users = mysqli_query($connection,$get_all_users);
?>
<div class="container" id="content-page">

<?php
while($row = mysqli_fetch_assoc($result_all_users)){
 ?>
    <div class="card mb-3">
        <div class="row">
        <img class="card-img-top user-image col col-sm-4" src="../Images/<?php echo $row['user_image']?>" alt="Card image cap">
        <div class="card-body col col-sm-8">
            <h5 class="card-title">UserName : <?php echo $row['username']?></h5>
            <p class="card-text">FullName : <?php echo $row['firstname']." ".$row['lastname']?></p>
            <p class="card-text">Email : <a href="#"><?php echo $row['email']?></a></p>
            <p class="card-text">Role : <?php echo $row['role']?></p>
            <button type="button" class="btn margin btn-danger col-sm-2"><a class="delete_post" href="post.php?remove_user=<?php echo $row['user_id'];?>"><i class="fa fa-trash-o"></i></a></button>

        </div>
        </div>
    </div>


<?php
}
?>
</div>
<?php include "includes/footer_admin.php" ?>

