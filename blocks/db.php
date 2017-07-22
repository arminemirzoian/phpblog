<?php
$db = mysqli_connect("localhost", "bloguser", "12345");
mysqli_select_db($db, "phpblog");
mysqli_query($db,"SET NAMES utf8");
?>