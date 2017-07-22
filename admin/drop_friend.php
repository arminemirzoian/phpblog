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
            if (isset($id))

            {$result = mysqli_query($db, "Delete From friends WHERE id='$id'");

                if ($result == "true") {
                    echo "Your friend is successfully deleted!";
                } else {
                    echo "Unable to delete your friend";
                }
            }
            else {
                echo "<p>You have not chosen a lesson that's why it is not possible to delete a friend</p>";
            }

            ?>
        </div>
    </div>
<?php include "blocks/footer.php"?>