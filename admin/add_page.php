<?php include "includes/header_admin.php" ?>
<?php include "includes/navigation_admin.php" ?>   
<?php
if(isset($_POST['add_page'])){
    $page_name = validate_query($_POST['filename']);
    $page_url = validate_query($_POST['link']);
    $page_content = validate_query($_POST['page_content']);
    if(isset($_POST['addit'])){
         $on_vavigation = 1;
    }
    else{
        $on_vavigation =0;
    }
    $query_add_page = "INSERT INTO pages ";
    $query_add_page .= "(page_url,page_name,page_content,navigation) VALUES ";
    $query_add_page .= "('{$page_url}','{$page_name}','{$page_content}','{$on_vavigation}')";
    $result_add_page = mysqli_query($connection,$query_add_page);
}

?>

<div class="container black" id="content-page">
    <form class="form-group" method="post">
        <label  for="">Page Name</label>
        <input class="form-control" type="text" name="filename" placeholder="Page Name">

        <label  for="">Page Link</label>
        <input class="form-control" type="text" name="link" placeholder="Page Link">

        <label  for="">Page Content</label>
        <textarea id="editor1" class="form-control" name="page_content" type="text" placeholder="Page Content"></textarea>
        <div class="checkbox" >
            <label><input type="checkbox" name="addit" value="yes">Add To Navigation</label>
        </div>
        <button class="btn btn-primary" action ="submit" name="add_page">Save</button>
    </form>
</div>
<?php include "includes/footer_admin.php" ?>
