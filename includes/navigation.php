<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">BLOGIFY</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--    Adding Select query to get categories for header            -->
                <?php
                $result_category= get_categories();
                while($row = mysqli_fetch_assoc($result_category)){
                    ?>
                    <li><a href="categories_post.php?category=<?php echo $row['id']?>"><?php echo $row['title'];?></a></li>
                <?php
                }
                ?>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="../../cms/login.php">Log In</a></li>

                <!---------------------------------------------->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
