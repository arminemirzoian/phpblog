<?php
include ('blocks/db.php');
include ('lock.php');

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    if ($title == " ") {
        unset($title);
    }
}

if (isset($_POST['meta_d'])) {
    $meta_d = $_POST['meta_d'];
    if ($meta_d == " ") {
        unset($meta_d);
    }
}
if (isset($_POST['meta_k'])) {
    $meta_k = $_POST['meta_k'];
    if ($meta_k == " ") {
        unset($meta_k);
    }
}
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    if ($text == " ") {
        unset($text);
    }
}
?>

    <title>
        Add category
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <div class="main_border">
<?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <?php
            if (isset($title) && isset($meta_d) && isset($meta_k) && isset($text))

            {$result = mysqli_query($db, "INSERT INTO categories (title,meta_d,meta_k,text) VALUES ('$title','$meta_d', '$meta_k','$text')");

                if ($result == "true") {
                    echo "<p>You have inserted new category to the database!</p>";
                } else {
                    echo "<p>Unable to insert new category to the database</p>";
                }
            }
            else {
                echo "<p>You have not entered all the information required. Please, go and fill in all the fields of the form</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>