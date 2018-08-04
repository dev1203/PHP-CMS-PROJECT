<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>

<?php
if(isset($_GET['remove_user'])){
    $id_to_remove = $_GET['remove_user'];
    $user_to_remove = "DELETE FROM users where user_id = '$id_to_remove'";
    $result = mysqli_query($connection, $user_to_remove);
    header('location:users.php?action=print');
}
//add_user.php?action=print
$get_all_users = "SELECT * FROM users";
$result_all_users = mysqli_query($connection,$get_all_users);
?>
<div class="container" id="content-page">
    <?php
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action=='print'){
            include "./includes/print_user.php";
        }
        else if($action == 'edit'){
            include "./includes/edit_user.php";
        }
    }
    ?>

</div>
<?php include "includes/footer_admin.php" ?>

