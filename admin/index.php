<?php
include ('lock.php');
?>
<title>
    Main page of admin block
</title>
<link href="style.css" rel="stylesheet" type="text/css">
<div class="main_border">
    <?php include "blocks/header.php"; ?>
    <div id="main">
        <?php include "blocks/left.php"; ?>
        <div id="right">
            <p>Welcome to Admin block!</p>
        </div>
    </div>
    <?php include "blocks/footer.php"?>

