
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

            </div>
        </div>
    </div>


    <?php
}
?>