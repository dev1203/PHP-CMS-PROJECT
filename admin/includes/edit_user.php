<?php
    if(isset($_POST['edit_user'])){
        $id = $_GET['id'];
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $user_image = $_FILES['image']['name'];
        $temp_image = $_FILES['image']['tmp_name'];



        move_uploaded_file($temp_image,"../Images/".$user_image);

        $query_to_update_user = "UPDATE users SET username = '$user_name',firstname = '$first_name', ";
        $query_to_update_user.=  "lastname = '$last_name',email ='$email',role = '$role' ,user_image = '$user_image' ";
        $query_to_update_user.= "WHERE user_id =  '$id'";
        $result_add_user = mysqli_query($connection, $query_to_update_user);
//        header("location:users.php?action=print");
    }




    if(isset($_GET['action'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM users WHERE user_id = '$id'";
        $result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        if(empty($row)){
            echo("<h5 class='message-error'>User Doesn't exists</h5>");
        }
        else{
            ?>
            <div class="container black" id="content-page">
                <div class="row form-wrapper">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="container-fluid">
                                <h3>Enter details to Edit a user</h3>

                                <label>User Name</label>
                                <input type="text" class="form-control" name = "user_name" value = "<?php echo $row['username'] ?>">

                                <label>First Name</label>
                                <input type="text" class="form-control" name = "first_name" value = "<?php echo $row['firstname'] ?>">

                                <label>Last Name</label>
                                <input type="text" class="form-control" name = "last_name" value = "<?php echo $row['lastname'] ?>">

                                <label>Email</label>
                                <input type="text" class="form-control"name = "email" value = "<?php echo $row['email'] ?>">

                                <label>Role</label>
                                <select class="form-control" name = "role">
                                    <option value="Subscriber">Subscriber</option>
                                    <option value = "Admin">Admin</option>
                                </select>

                                <div><img class="edit-user" src="../Images/<?php echo $row['user_image']?>"></div>

                                <label for="image">Image</label>
                                <input type="file" accept="image/*" class="form-control" name="image" value="<?php echo $row['user_image'] ?>">

                                <button type="submit" class="btn btn-success" name="edit_user">Success</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

<?php
        }
    }


?>




