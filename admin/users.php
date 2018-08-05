<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>

<?php
if(isset($_GET['remove_user'])){
    $id_to_remove = $_GET['remove_user'];
    users::remove_user($id_to_remove);
    header('location:users.php?action=print');
}
if(isset($_GET['accept_user'])){
    $user_id = $_GET['accept_user'];
    users::approve_user($user_id);
    header('location:users.php?action=print');
}
if(isset($_GET['action'])){
    $action = $_GET['action'];
    if($action=='print'){
        users::print_all_users();
    }
    else if($action == 'edit'){
       users::edit_user();
    }
    else if($action == 'add'){
        users::add_user();
    }
}
?>

<?php include "includes/footer_admin.php" ?>

