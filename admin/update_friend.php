<?php
include ('lock.php');
include ('blocks/db.php');

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    if ($title == " ") {
        unset($title);
    }
}
if (isset($_POST['link'])) {
    $link = $_POST['link'];
    if ($link == " ") {
        unset($link);
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>
    <title>
        Add friend
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <div class="main_border">
<?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <?php
            if (isset($title) && isset($link))

            {$result = mysqli_query($db, "UPDATE friends SET title='$title', link='$link' WHERE id='$id'");

                if ($result == "true") {
                    echo "Your friend's field is successfully updated!";
                } else {
                    echo "Unable to update";
                }
            }
            else {
                echo "<p>You have not entered all the information required, that's why the friend field can't be updated</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>