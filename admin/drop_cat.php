<?php
include ('blocks/db.php');
include ('lock.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
?>
    <title>
        Drop friend
    </title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <div class="main_border">
<?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <?php
            if (isset($id)) {
                $result0 = mysqli_query($db, "SELECT link, title FROM friends WHERE id='$id'");
                if (mysqli_num_rows($result0) > 0) {
                    echo "<p>There are some posts in this category. In order to delete it, you should throw the posts into other categories!</p>";
                } else {
                    $result = mysqli_query($db, "Delete From categories WHERE id='$id'");

                    if ($result == "true") {
                        echo "Your category is successfully deleted!";
                    } else {
                        echo "Unable to delete the category";
                    }
                }
            }
            else {
                    echo "<p>You have not chosen a lesson that's why it is not possible to delete a category</p>";
                }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>