<?php
include ('lock.php');
?>
<title>
    Page for adding new friend
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <form name="form1" method="post" action="add_friend.php">
                <div class="form-group"><p>
                    <label>
                        Insert the title of friend field:<br>
                        <input type="text" class="form-control" name="title" id="title">
                    </label>
                    </p></div>
                <div class="form-group"><p>
                    <label>
                        Insert the link for friend field:<br>
                        <input type="text" class="form-control" name="link" id="link">
                    </label>
                    </p></div>
                <p>
                    <label>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Insert friend into the database">
                    </label>
                </p>
            </form>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

