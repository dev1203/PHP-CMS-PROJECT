<?php
class users{
    static function get_all_user(){
        global $connection;
        $get_all_users = "SELECT * FROM users";
        $result_all_users = mysqli_query($connection,$get_all_users);
        return $result_all_users;
    }

    static function add_user(){
        global $connection;

        if(isset($_POST['add_user'])){
            $user_name = $_POST['user_name'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $user_image = $_FILES['image']['name'];
            $temp_image = $_FILES['image']['tmp_name'];

            move_uploaded_file($temp_image,"../Images/".$user_image);

            $query_to_add_user = "INSERT INTO users (username,firstname,lastname,email,password,role,user_image,user_status) VALUES ";
            $query_to_add_user .= "('$user_name','$first_name','$last_name','$email','$password','$role','$user_image','pending')";
            $result_add_user = mysqli_query($connection, $query_to_add_user);

            echo "<h5 class='message'>User is added Successfully</h5>";
        }
        ?>
        <div class="container black" id="content-page">
            <div class="row form-wrapper">
                <form method="post" action="" enctype="multipart/form-data">
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
                            <input type="password" class="form-control" name = "password">

                            <label>Role</label>
                            <select class="form-control" name = "role">
                                <option value="Subscriber">Subscriber</option>
                                <option value = "Admin">Admin</option>
                            </select>

                            <label for="image">Image</label>
                            <input type="file" accept="image/*" class="form-control" name="image">

                            <button type="submit" class="btn btn-success" name="add_user">Success</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        }

    static function print_all_users(){
        $result_all_users = users::get_all_user();
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
                        <a class="delete_post" href="users.php?remove_user=<?php echo $row['user_id'];?>"><button type="button" class="btn margin btn-danger col-sm-2"><i class="fa fa-trash-o"></i></button></a>
                        <a class="delete_post" href="users.php?action=edit&id=<?php echo $row['user_id'] ?>"><button type="button" class="btn margin btn-primary col-sm-2"><i class="fa fa-edit"></i></button></a>
                        <?php if($row['user_status']=='pending'){?>
                            <div>
                                <a href="users.php?accept_user=<?php echo $row['user_id'];?>"><button type="button" class="btn btn-success">Accept</button></a>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
        <?php
    }

    static function edit_user(){
        global $connection;
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
            header("location:users.php?action=print");
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
    }

    static function find_user($username){
        global $connection;
        $username = validate_query($username);

        $query_to_find = "SELECT * FROM users ";
        $query_to_find.= "WHERE username = '{$username}'";

        $result = mysqli_query($connection,$query_to_find);

        $row = mysqli_fetch_assoc($result);


        return $row['user_id'];
    }

    static function approve_user($user_id){
        global $connection;
        $user_id = validate_query($user_id);
        $query= "UPDATE users SET user_status = 'accepted' WHERE user_id ='$user_id'";
        $result = mysqli_query($connection, $query);
    }

    static function remove_user($id_to_remove){
        global $connection;
        $id_to_remove = validate_query($id_to_remove);
        $user_to_remove = "DELETE FROM users where user_id = '$id_to_remove'";
        $result = mysqli_query($connection, $user_to_remove);
    }

}
?>