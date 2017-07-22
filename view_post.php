<?php
include("blocks/db.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (!isset($id)) {
    $id = 1;
}
if (!preg_match('|^[\d]+$|', $id))
{
    exit ("<p>Incorrect query. Please, check the URL!</p>");
}
$result = mysqli_query($db, "SELECT * FROM data WHERE id='$id'");
if (!isset($result)) {
    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;
    exit(mysqli_connect_error());
}
if (mysqli_num_rows($result) > 0) {
    $myrow = mysqli_fetch_array($result);
    $new_view = $myrow["view"] + 1;
    $update = mysqli_query($db, "UPDATE data SET view='$new_view' WHERE id='$id'");
}
else {
    echo "<p>There is no data in the database</p>";
    exit();
}
?>
<title>
    <?php echo $myrow['title']; ?>
</title>
<meta name="description" content="<?php echo $myrow["meta_d"]; ?> ">
<meta name="keywords" content="<?php echo $myrow["meta_k"]; ?> ">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link href="css/animate.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet" />
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery-1.5.min.js" type="text/javascript"></script>
<script src="js/equalHeight.js" type="text/javascript"></script>
<div class="main_border">
    <?php include("blocks/header.php"); ?>
    <div id="main">
        <?php include ("blocks/left.php"); ?>
        <div id="right">
            <?php $n = 0;
            include ('blocks/nav.php');
            ?>
            <?php
            printf("<p class='post_title2'>%s</p><p class='post_adds2'>Author: %s</p><p class='post_adds2'>Data: %s</p>%s<p class='post_view'>Views: %s</p>",$myrow['title'],$myrow['author'],$myrow['date'],$myrow['text'],
                $myrow['view']);
            ?>
            <form action="vote_res.php" method="post" name="vv">
                <p class="pvote">Vote the post: &nbsp;&nbsp; 1
                <input name="score" type="radio" value="1">
                    2 <input name="score" type="radio" value="2">
                    3 <input name="score" type="radio" value="3">
                    4 <input name="score" type="radio" value="4">
                    5 <input name="score" type="radio" value="5" checked>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type="submit" name="submit" class='sub_vote' value="Vote!"></p>

            </form>
            <?php
            echo "<p class='post_comment'>Comments</p>";
            $result3 = mysqli_query($db, "SELECT * FROM comments WHERE post='$id'");
                $myrow3 = mysqli_fetch_array($result3);
                do {
                    printf("<div class='post_div'><p class='post_comment_add'>Commented by <strong>%s</strong><br>Date <strong>%s</strong></p><p>%s</p></div>",$myrow3['author'], $myrow3['date'], $myrow3['text']);
                }
                while ($myrow3 = mysqli_fetch_array($result3));

                $result4 = mysqli_query($db,'SELECT img FROM comments_setting');
                $myrow4 = mysqli_fetch_array($result4);
            ?>

            <p class='post_comment'>Add a comment to this post.</p>
            <form action="comment.php" method="post" name="form_com">

                <div class="form-group">
                    <div class="col-xs-6">
                    <label for="usr">Your name</label>
                <input name="author" type="text" size="20" maxlength="30" class="form-control" id="usr"><br>
                </div>
                </div>
                <p>
                <div class="form-group text">
                    <label>Text of your comment:<br>

                        <textarea name="text" cols="40" rows="5" class="form-control"></textarea>
                    </label>

                </div>
                </p>
                <p>Write the sum of numbers!<br>
                    <img style="padding-top: 5px;" src="<?php echo $myrow4['img']; ?>" height="40" width="80">
                    <span class="number"><input style="margin-top: -35px;" type="text" name="checking" size="5" maxlength="5"></span></p>
                <p>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="submit" class="btn btn-info" name="sub_com" value="make a comment">
                </p>

            </form>



        </div>
    </div>
    <?php include ("blocks/footer.php") ?>
</div>