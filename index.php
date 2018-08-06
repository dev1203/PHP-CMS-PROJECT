<?php
    $num_posts = 0;
if(isset($_GET['page'])){
    $page_num = $_GET['page'];
    if($page_num == 1 || empty($page_num) || $page_num=""){
        $num_posts = 0;
    }
    else{
        $num_posts = ($_GET['page']-1)*2;
    }

}
?>

<!--  Header  -->
<?php include "includes/header.php"; ?>

<!--  Navigation  -->   
<?php include "includes/navigation.php";  ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
           <div class="col-md-8">
               <h1 class="page-header">
                    Blogify
                   <small>Computer Science Posts <small>by professionals</small></small>
               </h1>
           </div>
            <?php
            $query_print_all_post = "SELECT     * FROM posts WHERE post_status = 'accepted'";
            $result = mysqli_query($connection,$query_print_all_post);
            $num_of_posts = mysqli_num_rows($result);
            $query_print_all_post = "SELECT * FROM posts WHERE post_status = 'accepted' LIMIT $num_posts,2";
            $result = mysqli_query($connection,$query_print_all_post);
            print_query($result);
            ?>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        <?php
            for($i=1;$i<=ceil(($num_of_posts+1)/2);$i++){
                echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
            }

        ?>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li> 
    </ul>
</nav>
<?php include "includes/footer.php"; ?>
