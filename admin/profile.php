<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<?php
    $user_name = $_SESSION['username'];
    $query_to_check_user = "SELECT * FROM users ";
    $query_to_check_user.= "WHERE username = '{$user_name}'";
    $result = mysqli_query($connection,$query_to_check_user);
    $row = mysqli_fetch_assoc($result);
?>
<div class="container" id="content-page">
        <div class="card card_profile mb-3">
            <img class="card-img-top user-image col col-sm-4" src="../Images/<?php echo $row['user_image']?>" alt="Card image cap">
            <div class="card-body profile_body col col-sm-8">
                <h5 class="card-title">UserName : <?php echo $row['username']?></h5>
                <p class="card-text">FullName : <?php echo $row['firstname']." ".$row['lastname']?></p>
                <p class="card-text">Email : <a href="#"><?php echo $row['email']?></a></p>
                <p class="card-text">Role : <?php echo $row['role']?></p>
                <a class="delete_post" href="users.php?action=edit&id=<?php echo $row['user_id'] ?>"><button type="button" class="btn margin btn-primary col-sm-2"><i class="fa fa-edit"></i></button></a>
            </div>
    </div>
</div>
<?php include "includes/footer_admin.php" ?>

