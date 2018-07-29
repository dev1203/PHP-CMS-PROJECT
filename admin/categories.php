<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<div id="wrapper">
    <div id="page-wrapper">
        <form method="post" action="categories.php">
            <div class="form-group">
               <input class="form-control" placeholder="Enter Category" name="category">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
        <?php
            update_category();
        ?>
        <div class="list-group" id="list-tab" role="tablist">
            <?php
            print_all_categories();
            ?>
        </div>
    </div>
</div>
<?php include "includes/footer_admin.php" ?>
