<?php
include ('blocks/db.php');
include ('lock.php');

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

            {$result = mysqli_query($db, "INSERT INTO friends (title,link) VALUES ('$title','$link')");

                if ($result == "true") {
                    echo "<p>You have inserted new friend to the database!</p>";
                } else {
                    echo "<p>Unable to insert new friend to the database</p>";
                }
            }
            else {
                echo "<p>You have not entered all the information required. Please, go and fill in all the fields of the form</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>