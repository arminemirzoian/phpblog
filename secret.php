<?php
include("blocks/db.php");
$result = mysqli_query($db, "SELECT title, meta_d, meta_k, text FROM settings WHERE page='secret'");
if (!isset($result)) {
    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com 
    <br>Code of the mistake is:</p>" ;
    exit(mysqli_error($db));
}
if (mysqli_num_rows($result) > 0) {
    $myrow = mysqli_fetch_array($result);
}
else {
    echo "<p>There is no data in the database</p>";
    exit();
}
if (isset ($_POST ['code'])) {
    $code = $_POST ['code'];
}
?>
<title>
    <?php echo $myrow['title']?>
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
    <?php include("blocks/header.php") ?>
    <div id="main">
        <?php include ("blocks/left.php") ?>
        <div id="right">
            <?php $n = 0;
            include ('blocks/nav.php');
            ?>
            <?php echo $myrow['text'];

            $result0 = mysqli_query($db,'SELECT prcode FROM options');
            if ($result0) {
                $myrow0 = mysqli_fetch_array($result0);
                $prcode = $myrow0["prcode"];
            }
            else {
                exit("<p>Unable to enter! Please check the code!</p>");
            }
            if (!isset ($code) or $code != $prcode) {
                echo "<form name='sec' action='secret.php' method='post'>
            <p align='center'><strong>Enter subscriber's code</strong></p>
            <p align='center'><input type='text' class='sinput'  name='code'></p>
            <p align='center'><input type='submit' class='sbutton btn btn-info' name='submit' value='Get access'></p>
</form>
<p align='center'><img src='img/zam.jpg' height='136' width='120'></p>";
                $result = mysqli_query($db, "SELECT id,title,description,date,author,mini_img,view FROM data Where secret=1");

                if (!$result) {
                    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com 
    <br>Code of the mistake is:</p>";
                }
                if (mysqli_num_rows($result) > 0) {
                    $myrow = mysqli_fetch_array($result);
                    do {
                        printf(
                            "<table class='post' align = 'center'>
                <tr>
                    <td class='post_title'> 
                    <p class='post_secret'><img class='mini' align='left' src='%s'><a href='#'>%s (No access)</a></p>
                    <p class='post_adds'>Creation date: %s</p>
                    <p class='post_adds'>Author of the lesson: %s</p></td >
                </tr >
                <tr >
                    <td>%s <p class='post_view'>Views: %s</p></td>
                </tr >
            </table ><br><br>", $myrow['mini_img'], $myrow['title'], $myrow['date'], $myrow['author'], $myrow['description'], $myrow['view']);
                    } while (
                        $myrow = mysqli_fetch_array($result)
                    );
                }
            }
            else {
                $result = mysqli_query($db, "SELECT id,title,description,date,author,mini_img,view FROM data WHERE secret=1");

                if (!$result) {
                    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com 
    <br>Code of the mistake is:</p>";
                }
                if (mysqli_num_rows($result) > 0) {
                    $myrow = mysqli_fetch_array($result);
                    do {
                        printf(
                            "<table class='post' align = 'center'>
                <tr>
                    <td class='post_title'> 
                    <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
                    <p class='post_adds'>Creation date: %s</p>
                    <p class='post_adds'>Author of the lesson: %s</p></td >
                </tr >
                <tr >
                    <td>%s <p class='post_view'>Views: %s</p></td>
                </tr >
            </table ><br><br>", $myrow['mini_img'], $myrow['id'], $myrow['title'], $myrow['date'], $myrow['author'], $myrow['description'], $myrow['view']);
                    } while (
                        $myrow = mysqli_fetch_array($result)
                    );
                }
            }
            ?>
        </div>
    </div>
    <?php include ("blocks/footer.php") ?>
</div>