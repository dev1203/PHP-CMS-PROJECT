<?php include "includes/header_admin.php" ?>
<?php include "controller/post_controller.php" ?>
<?php include "controller/category_controller.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<?php

    $result_num_posts = post::get_all_posts();
    $num_posts = mysqli_num_rows($result_num_posts);

    $query_num_comments = "SELECT * FROM comments";
    $result_num_comments = mysqli_query($connection,$query_num_comments);
    $num_comments = mysqli_num_rows($result_num_comments);

    $query_num_users = "SELECT * FROM users";
    $result_num_users = mysqli_query($connection,$query_num_users);
    $num_users = mysqli_num_rows($result_num_users);

    $result_num_categories= category::get_all_categories();
    $num_categories = mysqli_num_rows($result_num_categories);

    $pending_user ="SELECT * FROM users where user_status = 'pending'";
    $result_pending = mysqli_query($connection,$pending_user);
    $num_pending_user = mysqli_num_rows($result_pending);

    $pending_comment ="SELECT * FROM comments where comment_status = 'pending'";
    $result_pending_comments = mysqli_query($connection,$pending_comment);
    $num_pending_comments = mysqli_num_rows($result_pending_comments);

    $pending_categories ="SELECT * FROM category where status = 'pending'";
    $result_pending_categories = mysqli_query($connection,$pending_categories);
    $num_pending_categories= mysqli_num_rows($result_pending_categories);

    $pending_posts ="SELECT * FROM posts where post_status = 'pending'";
    $result_pending_posts = mysqli_query($connection,$pending_posts);
    $num_pending_posts= mysqli_num_rows($result_pending_posts);

?>

<div class="container" id="content-page">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card panel">
                    <div class="panel-heading panel-primary">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $num_posts ;?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="post.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class= "card panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php  echo $num_comments; ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $num_users;?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="users.php?action=print">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class='huge'><?php echo $num_categories;  ?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="categories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col col-sm-12">
            <div id="chart_div" class="chart">
            </div>
        </div>
        <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('visualization', '1.1',{'packages':['bar']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Total', 'Total', 'Pending','Approved'],
                    ['Posts', <?php echo $num_posts;?>,<?php echo($num_pending_posts); ?>, <?php echo ($num_posts-$num_pending_posts);?>],
                    ['Comments', <?php echo $num_comments;?>,<?php echo($num_pending_comments); ?>, <?php echo ($num_comments-$num_pending_comments);?>],

                    ['Users', <?php echo $num_users;?>,<?php echo($num_pending_user); ?>, <?php echo ($num_users-$num_pending_user);?>],
                    ['Categories', <?php echo $num_categories;?>,<?php echo($num_pending_categories); ?>, <?php echo ($num_categories-$num_pending_categories);?>]
                ]);

                // Set chart options
                var options = {
                    chats:{
                        title:'',
                        subtitile:''
                    }
                };
                var chart = new google.charts.Bar(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </div>
        <!-- /.row -->
</div>
<?php include "includes/footer_admin.php" ?>