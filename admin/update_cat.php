<?php
include ('lock.php');
include ('blocks/db.php');

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
if (isset($_POST['id'])) {
    $id = $_POST['id'];
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

            {$result = mysqli_query($db, "UPDATE categories SET title='$title', meta_d='$meta_d', meta_k='$meta_k',text='$text' WHERE id='$id'");

                if ($result == "true") {
                    echo "Your category is successfully updated!";
                } else {
                    echo "Unable to update";
                }
            }
            else {
                echo "<p>You have not entered all the information required, that's why the category can't be updated</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>