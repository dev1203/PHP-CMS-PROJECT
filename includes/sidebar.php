<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search_post_with_tags">
                <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>


    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <!-- Blog Categories Well -->

            <?php
            $result =get_categories();
            while($row = mysqli_fetch_assoc($result)){
            ?>
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#"><?php  echo $row['title']; ?></a>
                    </li>
                </ul>
            </div>
            <?php
            }
            ?>
    </div>
    <!-- /.row -->
</div>


<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>