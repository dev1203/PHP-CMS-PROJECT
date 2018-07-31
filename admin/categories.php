<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php"; ?>
<div class="container">
    <div class="row">
    <div class="col col-m-2">

    </div>
    <div class="col col-sm-10">
        <div id="wrapper">
            <div id="page-wrapper">
                <form method="post" action="categories.php">
                    <div class="form-group container">
                        <div class="row">
                                <input class="form-control col col-sm-9" placeholder="Enter Category" name="category">
                                <button class="btn btn-primary col col-sm-2" type="submit">Submit</button>
                        </div>
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
    </div>
</div>
</div>

<?php include "includes/footer_admin.php" ?>
