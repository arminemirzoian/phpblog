<?php
include ("blocks/db.php");
include ('lock.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<title>
    Edit texts
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <p><strong>Choose the page which you want to edit!</strong></p>
            <?php
            if (!isset($id))
            {
                $result = mysqli_query($db, "SELECT title, id FROM settings");
                $myrow = mysqli_fetch_array($result);
                do
                {
                    printf("<p><a href='edit_text.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
                }
                while ($myrow = mysqli_fetch_array($result));
            }
            else {
                $result = mysqli_query($db, "SELECT * FROM settings WHERE id=$id");
                $myrow = mysqli_fetch_array($result);

                print <<<HERE
<form name="form1" method="post" action="update_text.php">
                <p>
                    <label>
                        Insert the title of the page: (tag title)<br>
                        <input type="text" value="$myrow[title]" name="title" id="title">
                    </label>
                </p>
                <p>
                    <label>
                        Insert short description of the page<br>
                        <input type="text" value="$myrow[meta_d]" name="meta_d" id="meta_d">
                    </label>
                </p>
                <p>
                    <label>
                        Insert keywords of the page<br>
                        <input type="text" value="$myrow[meta_k]" name="meta_k" id="meta_k">
                    </label>
                </p>
                <p>
                    <label>
                        Insert the entire text of the page with tags:<br>
                        <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
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

