<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>

<?php
    if(isset($_POST['add_user'])){
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $user_image = "back.png";
//        $temp_image = ['user_image']['image'];

        $query_to_add_user = "INSERT INTO users (username,firstname,lastname,email,password,role,user_image) VALUES ";
        $query_to_add_user .= "('$user_name','$first_name','$last_name','$email','$password','$role','$user_image')";
        $result_add_user = mysqli_query($connection, $query_to_add_user);

        echo "<h5 class='message'>User is added Successfully</h5>";
    }
?>
<div id="wrapper">
    <div id="page-wrapper">
        <form method="post" action="">
            <div class="form-group">
                <div class="container-fluid centered">
                <h3>Enter details to add a user</h3>

                <label>User Name</label>
                <input type="text" class="form-control" name = "user_name">

                <label>First Name</label>
                <input type="text" class="form-control" name = "first_name">

                <label>Last Name</label>
                <input type="text" class="form-control" name = "last_name">

                <label>Email</label>
                <input type="text" class="form-control"name = "email">

                <label>Password</label>
                <input type="text" class="form-control" name = "password">

                <label>Role</label>
                <input type="text" class="form-control" name = "role">

                <label>User Image</label>
                <input type="file" accept="image/*" name = "user_image">

                <button type="submit" class="btn btn-success" name="add_user">Success</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "includes/footer_admin.php" ?>

