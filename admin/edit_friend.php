<?php
include ("blocks/db.php");
include ('lock.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<title>
    Page for editing friend field
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <?php
            if (!isset($id))
            {
                $result = mysqli_query($db, "SELECT title, id FROM friends");
                $myrow = mysqli_fetch_array($result);
                do
                {
                    printf("<p><a href='edit_friend.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
                }
                while ($myrow = mysqli_fetch_array($result));
            }
            else {
                $result = mysqli_query($db, "SELECT * FROM friends WHERE id=$id");
                $myrow = mysqli_fetch_array($result);
                echo "<h3 align='center'>Edit the friend field!</h3>";
                print <<<HERE
                <form name='form1' method='post' action='update_friend.php'>
                <p>
                    <label>
                        Insert friend's name:<br>
                        <input type="text" value="$myrow[title]" name="title" id="title">
                    </label>
                </p>
              <p>
                    <label>
                        Insert friend's link:<br>
                        <input type="text" value="$myrow[link]" name="link" id="link">
                    </label>
                </p>
                 <input name="id" type="hidden" value="$myrow[id]">
                <p>
                    <label>
                        <input type="submit" name="submit" id="submit" value="Save the changes">
                    </label>
                </p>
            </form>
HERE;
            }

            ?>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

