<?php
include ('blocks/db.php');
if (isset($_POST['score'])) {
    $score = $_POST['score'];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
if (!isset($id)) {
    $id = 1;
}
    $result = mysqli_query($db, "SELECT rating, q_vote FROM data WHERE id='$id'");
if (!$result) {
    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;
    exit(mysqli_error($db));
}

    if (mysqli_num_rows($result) > 0) {
        $myrow = mysqli_fetch_array($result);

        $new_rating = $myrow['rating'] + $score;
        $new_q_vote = $myrow['q_vote'] + 1;
        $update = mysqli_query($db, "UPDATE data SET rating ='$new_rating', q_vote ='$new_q_vote' WHERE id='$id'");

        if ($update) {
            echo "<html><head><meta http-equiv='refresh' content='0; url=view_post.php?id=$id'></head></html>";
            exit();
        }
    }
    else {
        echo "<p>There is no data in the database</p>";
        exit();
    }

?>