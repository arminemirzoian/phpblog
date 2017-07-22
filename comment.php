<?php
include("blocks/db.php");
if (isset($_POST['author'])) {
    $author = $_POST['author'];
}
if (isset($_POST['text'])) {
    $text = $_POST['text'];
}
if (isset($_POST['checking'])) {
    $checking = $_POST['checking'];
}
if (isset($_POST['author'])) {
    $author = $_POST['author'];
}
if (isset($_POST['sub_com'])) {
    $sub_com = $_POST['sub_com'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

if (isset($sub_com)) {

    if (isset($author)) {
    trim($author);
    }
else {
    $author = "";
}
    if (isset($text)) {
        trim($text);
    }
    else {
        $text = "";
    }
 if (empty($author) or empty($text))    {
    exit ("<p>You have not entered all the fields. Go back and fill them all in.</p><input type='button' name='back' 
value='go back' onclick='javascript:history.back();'>");
 }

$author = stripslashes($author);
$text = stripslashes($text);
$author = htmlspecialchars($author);
$text = htmlspecialchars($text);

$result = mysqli_query($db, "SELECT sum FROM comments_setting");
$myrow = mysqli_fetch_array($result);

if ($checking == $myrow['sum']) {
    $date = date('Y-m-d');
    $result2 = mysqli_query($db, "INSERT INTO comments (post,author,text,date) VALUES ('$id', '$author', '$text', '$date')");
//sending an email about a comment received
    $address = "arminemirzoian@gmail.com";
    $subject = "New comment in your blog";
    $result3 = mysqli_query($db, "SELECT title FROM data WHERE id='$id'");
    $myrow3 = mysqli_fetch_array($result3);
    $post_title = $myrow3['title'];
    $message = "There is a new comment to the post - ".$post_title."\nComment made by: ".$author."\nText of the comment".$text."\nLink to the post:
    http://localhost/phpblog/view_post.php?id=".$id."";
    mail ($address,$subject,$message, "Content-type:text/plain; Charset=windows-1251\r\n");
    echo "<html><head><meta http-equiv='refresh' content='0; url=view_post.php?id=$id'></head></html>";exit();
}
else {
    exit ("<p>You have entered wrong sum of numbers. Go back and fill them all in.</p><input type='button' name='back' 
value='go back' onclick='javascript:history.back();'>");
}

}