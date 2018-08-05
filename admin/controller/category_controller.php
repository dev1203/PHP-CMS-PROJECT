<?php
class category{
    static function get_all_categories(){
        global $connection;
        $query_print_all_category = "SELECT * FROM category";
        $result_all_category = mysqli_query($connection,$query_print_all_category);
        return $result_all_category;
    }
    static function print_all_categories(){
        $result = category::get_all_categories();
        while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="card category-card">
                <div class="card-body">
                    <?php echo $row['title'] ?>
                    <a class="right" href="categories.php?delete=<?php echo $row['id'];?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    <?php if($row['status']=='pending'){?>
                        <div>
                            <a href="categories.php?accept=<?php echo $row['id'];?>"><button type="button" class="btn btn-success right">Accept</button></a>
                        </div>
                    <?php }?>
                </div>
            </div>
            <?php
        }
    }

    static function add_category($category){
        global $connection;
        $category_to_add = validate_query($category);
        $query_add_category = "INSERT INTO category (title,status) VALUES ('$category','pending')";
        $result = mysqli_query($connection,$query_add_category);
    }

    static function delete_category($id){
        global $connection;
        $id_to_delete = validate_query($id);
        $query_delete = "DELETE FROM category WHERE id = '$id_to_delete'";
        $result_deleted = mysqli_query($connection,$query_delete);
    }

    static function accept_category($id){
        global $connection;
        $id_to_approve = validate_query($id);
        $query_to_approve = "UPDATE category SET status = 'accepted' WHERE id='$id_to_approve'";
        $result_approve = mysqli_query($connection,$query_to_approve);
    }

}
?>