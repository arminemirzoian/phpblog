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
if (isset($_POST['date'])) {
    $date = $_POST['date'];
    if ($date == " ") {
        unset($date);
    }
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
    if ($description == " ") {
        unset($description);
    }
}
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    if ($text == " ") {
        unset($text);
    }
}
if (isset($_POST['author'])) {
    $author = $_POST['author'];
    if ($author == " ") {
        unset($author);
    }
}
if (isset($_POST['img'])) {
    $img = $_POST['img'];
    if ($img == " ") {
        unset($img);
    }
}
if (isset($_POST['cat'])) {
    $cat = $_POST['cat'];
    if ($cat == " ") {
        unset($cat);
    }
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (isset($_POST['secret'])) {
    $secret = $_POST['secret'];
    if ($secret == " ") {
        unset($secret);
    }
}

?>

    <title>
        Add post
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <div class="main_border">
<?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <?php
            if (isset($title) && isset($meta_d) && isset($meta_k) && isset($date) && isset($description) && isset($text)
                && isset($author) && isset($img) && isset($cat) && isset($secret))

            {$result = mysqli_query($db, "UPDATE data SET title='$title', meta_d='$meta_d', meta_k='$meta_k', date='$date',
description='$description',text='$text',author='$author', mini_img='$img', cat='$cat', secret='$secret' WHERE id='$id'");

                if ($result == "true") {
                    echo "Your post is successfully updated!";
                } else {
                    echo "Unable to update";
                }
            }
            else {
                echo "<p>You have not entered all the information required, that's why the post can't be updated</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>