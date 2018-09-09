<?php
class post{

    static function get_all_posts(){
        global $connection;
        $query_get_all_posts = "SELECT * FROM posts";
        $result_all_posts = mysqli_query($connection,$query_get_all_posts);
        return $result_all_posts;
    }

    static function add_post(){
        global $connection;
        if(isset($_POST['add_post'])){
            $title =validate_query($_POST['title']);
            $author =users::find_user($_SESSION['username']);
            $category_id = validate_query($_POST['category_id']);

            $date = validate_query($_POST['date']);
            $content = validate_query( $_POST['content'] );
            $tags = validate_query($_POST['tags']);

            $image = $_FILES['image']['name'];
            $temp_image= $_FILES['image']['tmp_name'];

            move_uploaded_file($temp_image,"../Images/".$image);

            $query = "INSERT INTO posts (post_title,post_author,post_date,post_image,post_content,post_tags,post_status,post_category_id) VALUES ('$title','$author','$date','$image','$content','$tags','pending','$category_id')";
            $result = mysqli_query($connection,$query);
            if(!$result){
            die(mysqli_error($connection));

            }
            else{
                echo '<div class="alert alert-success">You Post Has Been Added</div>';
            }
        }
        ?>
        <div class="container" id="content-page">
            <div class="row form-wrapper">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group" >
                        <label for="title">Post Title</label>
                        <input type="text" placeholder="Enter Title" name="title" class="form-control">

                        <label for="author">Post Author</label>
                        <input disabled type="text" placeholder="Enter Author" name="author" class="form-control" value="<?php echo ($_SESSION['username']);?>">

                        <label for="date">Post Date</label>
                        <input type="date" placeholder="Enter Title" name="date" class="form-control">

                        <label for="date">Image</label>
                        <input type="file" accept="image/*" class="form-control" name="image">

                        <label for="date">Post Content</label>
                        <textarea id="editor1" class="form-control text" placeholder="Enter Content" name="content"></textarea>

                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'editor1' );
                        </script>


                        <label for="date">Post Category</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <?php
                            $result_category = category::get_all_categories();
                            while($row_category = mysqli_fetch_assoc($result_category)){
                                echo "<option value ='{$row_category['id']}'>{$row_category['title']}</option>";
                            }
                            ?>
                        </select>


                        <label for="tags">Post Tags</label>
                        <input type="text" placeholder="Enter Title" name="tags" class="form-control">

                        <button type="submit" class="btn btn-dark" name="add_post">Save</button>
                    </div>
                </form>
            </div>
        </div>
<?php
    }
    static function print_post(){
        $result_all_posts = post::get_all_posts();
        while($row_all_posts = mysqli_fetch_assoc($result_all_posts)){
        ?>
        <div class="container" id="content-page">
            <div class="card mb-3">
                <a class="eye" href="../post.php?id=<?php echo $row_all_posts['post_id'];?>"><i class="fa fa-eye"></i></a>
                <img class="card-img-top post-image" src="../Images/<?php echo $row_all_posts['post_image']?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row_all_posts['post_title']?></h5>
                    <p class="card-text"><?php echo $row_all_posts['post_content']?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $row_all_posts['post_date']?></small></p>
                </div>
                <hr>
                <div class="container">
                    <a class="delete_post" href="post.php?source=edit&id=<?php echo $row_all_posts['post_id'];?>"><button type="button" class="btn margin btn-primary col-sm-2"><i class="fa fa-edit"></i></button></a>
                    <a class="delete_post" href="post.php?source=remove&id=<?php echo $row_all_posts['post_id'];?>"><button type="button" class="btn margin btn-danger col-sm-2"><i class="fa fa-trash-o"></i></button></a>
                    <?php if($row_all_posts['post_status']=='pending'){?>
                        <div>
                            <a class="delete_post" href="post.php?source=accept&id=<?php echo $row_all_posts['post_id'];?>"><button type="button" class="btn margin btn-success col-sm-2">Accept</button></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        }
    }

    static function edit_post(){
        global $connection;

        if(isset($_GET['source'])){
            $id_to_edit = $_GET['id'];
            $query_to_edit = "SELECT * FROM posts where post_id = '$id_to_edit'";
            $result_to_edit = mysqli_query($connection, $query_to_edit);
            $row_edit = mysqli_fetch_assoc($result_to_edit);
        }
        if(isset($_POST['update_post'])){
            $id = $_POST['update_post'];
            $title = $_POST['title'];
            $author = $_POST['author'];
            $date = $_POST['date'];
            $content = $_POST['content'];
            $tags = $_POST['tags'];
            $category = $_POST['category_id'];
            $image = $_FILES['image']['name'];
            $temp_image= $_FILES['image']['tmp_name'];

            move_uploaded_file($temp_image,"../Images/".$image);

            $query = "UPDATE posts SET post_category_id='$category',post_title = '$title', post_author ='$author',post_date='$date',post_content='$content',post_tags='$tags', post_image = '$image' WHERE post_id = '$id'";
            $result = mysqli_query($connection,$query);
            if(!$result){
                die(mysqli_error($connection));
            }
            else{
                print_r(mysqli_error($connection));
                echo '<div class="alert alert-success">You Post Has Been Updated</div>';
            }
        }
        ?>
        <div class="container" id="content-page">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" placeholder="Enter Title" name="title" class="form-control" value="<?php echo $row_edit['post_title']?>">

                    <label for="author">Post Title</label>
                    <input type="text" placeholder="Enter Author" name="author" class="form-control" value="<?php echo $row_edit['post_author']?>">

                    <label for="date">Post Date</label>
                    <input type="date" placeholder="Enter Title" name="date" class="form-control" value="<?php echo $row_edit['post_date']?>>

                    <label for="card-img-top">Image</label>
                    <img src="../Images/<?php echo $row_edit['post_image'];?>" class="card-img-top post-image">
                    <input type="file" accept="image/*" class="form-control" name="image" >

                    <label for="date">Post Date</label>
                    <textarea id="editor2" class="form-control text" placeholder="Enter Content" name="content"><?php echo $row_edit['post_content']?></textarea>

                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor2' );
                    </script>

                    <label for="tags">Post Tags</label>
                    <input type="text" placeholder="Enter Title" name="tags" class="form-control" value="<?php echo $row_edit['post_tags']?>">

                    <label for="tags">Post Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <?php
                        $result_category = category::get_all_categories();
                        while($row_category = mysqli_fetch_assoc($result_category)){
                         echo "<option value ='{$row_category['id']}'>{$row_category['title']}</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-dark" name="update_post" value="<?php echo $_GET['id'];?>">Save</button>
                </div>
            </form>
        </div>
    <?php
    }

    static function remove_post($id){
        global $connection;
        $query_to_delete_post = "DELETE FROM posts where post_id ='$id'";
        $result_post_delete = mysqli_query($connection,$query_to_delete_post);
        if(!$result_post_delete){
            die(mysqli_error($connection));
        }
        else{
            header("location:post.php");
        }
    }

    static function approve_post($id){
        global $connection;
        $query_to_approve = "UPDATE posts SET post_status = 'accepted' WHERE post_id='$id'";
        $result_approved = mysqli_query($connection, $query_to_approve);
    }
}
?>