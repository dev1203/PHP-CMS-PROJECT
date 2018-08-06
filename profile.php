<!--  Header  -->
<?php include "includes/header.php"; ?>

<!--  Navigation  -->
<?php include "includes/navigation.php";  ?>

<?php
if(isset($_GET['profile'])){
    $profile_name = validate_query($_GET['profile']);
    $query_to_fetch = "SELECT * FROM users ";
    $query_to_fetch.= "WHERE user_id = '{$profile_name}'";

    $result_fetched = mysqli_query($connection,$query_to_fetch);
    $row =mysqli_fetch_assoc($result_fetched);

    $get_all_related_post = "SELECT * FROM posts";
    $get_all_related_post.= " WHERE post_author = '{$profile_name}'";

    $result_related_post = mysqli_query($connection,$get_all_related_post);



}
?>
<h2 class="text-center margin">All the Post by this User</h2>

<div class="container ">
        <div class="col col-sm-8">
            <div class="card card_profile mb-3">
                <img class="card-img-top user-image col col-sm-4" src="Images/<?php echo $row['user_image']?>" alt="Card image cap">
                <div class="card-body profile_body col col-sm-8">
                    <h5 class="card-title">UserName : <?php echo $row['username']?></h5>
                    <p class="card-text">FullName : <?php echo $row['firstname']." ".$row['lastname']?></p>
                    <p class="card-text">Email : <a href="#"><?php echo $row['email']?></a></p>
                    <p class="card-text">Role : <?php echo $row['role']?></p>
                </div>
            </div>
        </div>
    <div>

        <?php print_query($result_related_post);?>
    </div>
        <?php include "includes/sidebar.php"?>
<?php include "includes/footer.php"; ?>
</div>


