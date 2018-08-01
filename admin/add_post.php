<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php" ?>
<?php
if(isset($_POST['btn-add'])) {
    $title = $_POST['btn-add'];
    die("came here");
}
?>

<div class="container" id="content-page">
    <div class="row form-wrapper">
        <form id="add_post">
            <div class="form-group" >
                <label for="title">Post Title</label>
                <input type="text" placeholder="Enter Title" name="title" class="form-control" id="title-add">

                <label for="author">Post Title</label>
                <input type="text" placeholder="Enter Author" name="author" class="form-control">

                <label for="date">Post Date</label>
                <input type="date" placeholder="Enter Title" name="date" class="form-control">

                <label for="date">Image</label>
                <input type="file" accept="image/*" class="form-control" name="image">

                <label for="date">Post Date</label>
                <textarea class="form-control text" placeholder="Enter Content" name="content"></textarea>

                <label for="tags">Post Tags</label>
                <input type="text" placeholder="Enter Title" name="tags" class="form-control">
                <button type="submit" class="btn btn-dark" name="btn-add" >Save</button>
            </div>
        </form>
    </div>

</div>

<?php include "includes/footer_admin.php" ?>

