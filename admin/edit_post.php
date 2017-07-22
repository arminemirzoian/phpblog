<?php
include ("blocks/db.php");
include ('lock.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
?>

<title>
    Page for editing post
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
                $result = mysqli_query($db, "SELECT title, id FROM data");
                $myrow = mysqli_fetch_array($result);
                do
                    {
                    printf("<p><a href='edit_post.php?id=%s'>%s</a></p>",$myrow["id"],$myrow["title"]);
                }
                while ($myrow = mysqli_fetch_array($result));
            }
            else {
                $result = mysqli_query($db, "SELECT * FROM data WHERE id=$id");
                $myrow = mysqli_fetch_array($result);

                $result2 = mysqli_query($db, "SELECT id, title FROM categories");
                $myrow2 = mysqli_fetch_array($result2);
                $count = mysqli_num_rows($result2);
                echo "<h3 align='center'>Edit the post!</h3>";
                echo  "<form name='form1' method='post' action='update_post.php'>
                <p>Select the category for the post<br><select name='cat' size='$count'>";
                do {
                    if (
                        $myrow['cat'] == $myrow2['id']
                    )
                    {
                        printf("<option value='%s' selected>%s</option></p>",$myrow2["id"],$myrow2["title"]);
                    }
                    else {
                        printf("<option value='%s'>%s</option></p>", $myrow2["id"], $myrow2["title"]);
                    }
                }
                while ($myrow2 = mysqli_fetch_array($result2));
echo "</select></p>";
echo "<p>Insert the secret section:<br>
                    <label><strong>Yes</strong>
                        <input type='radio'";

if ($myrow['secret'] == 1) {echo ' checked ';}

               echo "name='secret' id='secret' value='1'></label>
                    <label><strong>No</strong>
                        <input type='radio'";
                if ($myrow['secret'] == 0) {echo ' checked ';}
                echo     "name='secret' id='secret' value='0'>
                    </label>
                </p>";

                print <<<HERE
                <p>
                    <label>
                        Insert the title of the data:<br>
                        <input type="text" value="$myrow[title]" name="title" id="title">
                    </label>
                </p>
                <p>
                    <label>
                        Insert short description of the data:<br>
                        <input type="text" value="$myrow[meta_d]" name="meta_d" id="meta_d">
                    </label>
                </p>
                <p>
                    <label>
                        Insert keywords of the data:<br>
                        <input type="text" value="$myrow[meta_k]" name="meta_k" id="meta_k">
                    </label>
                </p>
                <p>
                    <label>
                        Insert date when the data was added:<br>
                        <input type="date" value="$myrow[date]" name="date" id="date">
                    </label>
                </p>
                <p>
                    <label>
                        Insert short description of the data with paragraph tags:<br>
                        <textarea name="description" id="description" cols="40" rows="5">$myrow[description]</textarea>
                    </label>
                </p>
                <p>
                    <label>
                        Insert the entire text of the data with tags:<br>
                        <textarea name="text" id="text" cols="40" rows="20">$myrow[text]</textarea>
                    </label>
                </p>
                <p>
                    <label>
                        Insert the name of the author of the data:<br>
                        <input type="text" value="$myrow[author]" name="author" id="author">
                    </label>
                </p>
                <p>
                    <label>
                        Insert the name of the mini image of the data:<br>
                        <input type="text" value="$myrow[mini_img]" name="img" id="img">
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

