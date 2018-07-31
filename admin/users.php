<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>

<?php
if(isset($_GET['remove_user'])){
    $id_to_remove = $_GET['remove_user'];
    $user_to_remove = "DELETE FROM users where user_id = '$id_to_remove'";
    $result = mysqli_query($connection, $user_to_remove);
    header('location:users.php');
}
?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">

        <h3>All users</h3>
        </div>
        <?php
$get_users= "SELECT *  FROM users";
$result = mysqli_query($connection,$get_users);
while($row = mysqli_fetch_assoc($result)){
    ?>
     <div class="container-fluid">
         <div class="cards user">
             <h3>Username: <?php echo $row['username'];?></h3>
             <p>Firstname: <?php echo $row['firstname'];?></p>
             <p>Lastname: <?php echo $row['lastname'];?></p>
             <p>Email: <?php echo $row['email'];?></p>
             <p>Role: <?php echo $row['role'];?></p>
             <img class="user-image img-responsive" src="../Images/<?php echo $row['user_image'];?>">
             <a class='glyphicon glyphicon-trash delete_post' href="?remove_user=<?php echo $row['user_id']?>"></a>
         </div>
     </div>

<?php
}

?>
    </div>
</div>

<?php include "includes/footer_admin.php" ?>

