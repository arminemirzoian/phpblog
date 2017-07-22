<?php
include ('lock.php');
?>
<title>
    Page for inserting new post
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <form name="form1" method="post" action="add_post.php">
                <div class="form-group">
                <p>
                    <label>
                        Insert the title of the post:<br>
                        <input type="text" name="title"  class="form-control" id="title">
                    </label>
                </p>
                </div>
                <div class="form-group"><p>
                    <label>
                        Insert short description of the post:<br>
                        <input type="text" name="meta_d" class="form-control" id="meta_d">
                    </label>
                </p>
                </div>
                <div class="form-group">
                    <p>
                    <label>
                        Insert keywords of the post:<br>
                        <input type="text" name="meta_k" class="form-control" id="meta_k">
                    </label>
                </p>
                </div>
                <div class="form-group">
                    <p>
                    <label>
                        Insert date when the post was added:<br>
                        <input type="date" name="date" class="form-control" id="date" value="<?php $date = date('Y-m-d'); echo $date;?>">
                    </label>
                </p>
                </div>
                <div class="form-group"><p>
                    <label>
                        Insert short description of the post with paragraph tags:<br>
                        <textarea name="description" id="description" class="form-control" cols="40" rows="5"></textarea>
                    </label>
                </p>
                </div>
                <div class="form-group"><p>
                    <label>
                        Insert the entire text of the post with tags:<br>
                        <textarea name="text" id="text" class="form-control" cols="40" rows="20"></textarea>
                    </label>
                    </p></div>
                <div class="form-group"><p>
                    <label>
                        Insert the name of the author of the post:<br>
                        <input type="text" name="author" class="form-control" id="author">
                    </label>
                </p>
                </div>
                <p>Insert the secret section:<br>
                    <label><strong>Yes</strong>
                        <input type="radio" name="secret" id="secret" value="1">
                    </label>
                    <label><strong>No</strong>
                        <input type="radio" name="secret" id="secret" value="0" checked>
                    </label>
                </p>
                <div class="form-group">
                    <p>
                    <label>
                        Insert the location of the mini image:<br>
                        <input type="text" name="img" class="form-control" id="img">
                    </label>
                </p>
                </div>
                <div class="form-group">
                    <p><label>
                        Insert the category of the post:<br>
                        <select name="cat" class="form-control">
                           <?php $result = mysqli_query($db, "SELECT id, title FROM categories");
                            if (!$result) {
                            echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
                <br>Code of the mistake is:" ;
                exit(mysqli_error($db));
                }
                if (mysqli_num_rows($result) > 0) {
                $myrow = mysqli_fetch_array($result);

                    do {
                        printf("<option value='%s'>%s</option>",$myrow['id'], $myrow['title']);
                    }
                    while (
                        $myrow = mysqli_fetch_array($result)
                    );
                }
                else {
                echo "<p>There is no data in the database</p>";
                exit();
                }

                       ?>

                        </select>
                    </label>
                    </p></div>

                <p>
                    <label>
                        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Insert the post to the database">
                    </label>
                </p>
            </form>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

