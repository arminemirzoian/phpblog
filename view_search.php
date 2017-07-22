<?php
include("blocks/db.php");
if (isset($_POST['submit_s'])) {
    $submit_s = $_POST['submit_s'];
}
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

if (isset($submit_s)) {
if (empty ($search) or strlen($search) < 4) {
    exit("<p>You have not entered enough symbols for your search</p>");
}
$search = trim($search);
$search = stripslashes($search);
$search = htmlspecialchars($search);
}
else {
exit("<p>You addressed to the file without the required parameters</p>");
}
?>
<title>
    <?php echo " Posts by $search ";?>
</title>
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
    <?php include("blocks/header.php") ?>
    <div id="main">
        <?php include ("blocks/left.php") ?>
        <div id="right">
            <?php $n = 0;
            include ('blocks/nav.php');
            ?>
            <?php
           $result = mysqli_query($db, "SELECT id, title, description, author, mini_img, date, view, rating, q_vote FROM data WHERE secret=0 AND MATCH(text)
 AGAINST ('$search')");
            if (mysqli_num_rows($result) > 0) {
                $myrow = mysqli_fetch_array($result);
                do {
                    $r = $myrow['rating']/$myrow['q_vote'];
                    $r = intval($r);
                    printf(
                        "<br><table class='post' align = 'center'>
                <tr>
                    <td class='post_title'> 
                    <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
                    <p class='post_adds'>Creation date: %s</p>
                    <p class='post_adds'>Author of the lesson: %s</p></td >
                </tr >
                <tr >
                    <td>%s <p class='post_view'>Views: %s &nbsp;&nbsp;&nbsp; Rating: <img src='img/%s.gif'></p></td>
                </tr >
            </table ><br><br>", $myrow['mini_img'], $myrow['id'], $myrow['title'], $myrow['date'], $myrow['author'], $myrow['description'], $myrow['view'], $r);
                } while (
                    $myrow = mysqli_fetch_array($result)
                );
            }
            else {
                echo "<p>Can't find word <strong>\"$search\"</strong> in blog!</p>";
                exit();
            }
            ?>
        </div>
    </div>
    <?php include ("blocks/footer.php") ?>
</div>