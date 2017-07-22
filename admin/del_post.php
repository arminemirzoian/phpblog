<?php
include ("blocks/db.php");
include ('lock.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<title>
    Delete post
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <p><strong>Choose the post you want to delete</strong></p>
            <form action="drop_post.php" method="post">
            <?php
                $result = mysqli_query($db, "SELECT title, id FROM data");
                $myrow = mysqli_fetch_array($result);
                do
                {
                    printf("<p><input name='id' type='radio' value='%s'><label>&nbsp; %s </label></p>",$myrow["id"],$myrow["title"]);
                }
                while ($myrow = mysqli_fetch_array($result));

                ?>
                <p>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Delete post">
                </p>
            </form>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

