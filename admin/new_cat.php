<?php
include ('lock.php');
?>
<title>
    Page for inserting new category
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <form name="form1" method="post" action="add_cat.php">
                <div class="form-group"><p>
                    <label>
                        Insert the title of the category:<br>
                        <input type="text" class="form-control" name="title" id="title">
                    </label>
                    </p></div>
                <div class="form-group"><p>
                    <label>
                        Insert short description of the category:<br>
                        <input type="text" class="form-control" name="meta_d" id="meta_d">
                    </label>
                    </p></div>
                <div class="form-group"><p>
                    <label>
                        Insert keywords of the category:<br>
                        <input type="text" class="form-control" name="meta_k" id="meta_k">
                    </label>
                    </p></div>
                <div class="form-group"><p>
                    <label>
                        Insert the entire text of the category with tags:<br>
                        <textarea name="text" id="text" class="form-control" cols="40" rows="20"></textarea>
                    </label>
                    </p></div>
                <p>
                    <label>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Insert the category to the database">
                    </label>
                </p>
            </form>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

