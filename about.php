<?php
include("blocks/db.php");
$result = mysqli_query($db, "SELECT title, meta_d, meta_k, text FROM settings WHERE page='about'");
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
    <?php $n = 4; include("blocks/header.php") ?>
    <div id="main">
        <?php include ("blocks/left.php") ?>
        <div id="right">
            <?php $n = 4;
            include ('blocks/nav.php');
            ?>
            <?php echo $myrow['text']?>
        </div>
    </div>
    <?php include ("blocks/footer.php") ?>
</div>