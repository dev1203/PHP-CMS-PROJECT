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
            $query_print_all_post = "SELECT * FROM posts";
            $result = mysqli_query($connection,$query_print_all_post);
//            This function is available in functions.php
            print_query($result);
            ?>
            <!-- Blog Sidebar Widgets Column -->
            <?php  include "includes/sidebar.php";?>
        </div>
        <!-- /.row -->
        <hr>
<?php include "includes/footer.php"; ?>
