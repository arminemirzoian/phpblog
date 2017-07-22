<div id="left">
    <div class="nav_title">Categories</div>
    <?php
    $result2 = mysqli_query($db, "SELECT * FROM categories");
    if (!isset($result2)) {
        echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;

        exit(mysqli_error($db));
    }
    if (mysqli_num_rows($result2) > 0) {
        $myrow2 = mysqli_fetch_array($result2);

        do {
            printf("<p class='point'><img src='img/arr.jpg' height='10px' width='10px'>&nbsp;&nbsp;<a class='nav_link' href='view_cat.php?cat=%s'>%s</a></p>",$myrow2['id'], $myrow2['title']);
        }
        while ($myrow2 = mysqli_fetch_array($result2));
    }
    else {
        echo "<p>There is no data in the database</p>";
        exit();
    }
    ?>
    <div class="nav_title">Latest posts</div>
    <?php
    $result3 = mysqli_query($db, "SELECT id, title FROM data WHERE secret=0 ORDER BY id DESC LIMIT 5");
    if (!$result3) {
        echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;

        exit(mysqli_error($db));
    }
    if (mysqli_num_rows($result3) > 0) {
        $myrow3 = mysqli_fetch_array($result3);

        do {
            printf("<p class='point'><img src='img/arr2.jpg' height='10px' width='10px'>&nbsp;&nbsp;<a class='nav_link' href='view_post.php?id=%s'>%s</a></p>",$myrow3['id'], $myrow3['title']);
        }
        while ($myrow3 = mysqli_fetch_array($result3));
    }
    else {
        echo "<p>There is no data in the database</p>";
        exit();
    }
    ?>
    <div class="nav_title">Archive</div>
    <?php
    $result4 = mysqli_query($db, "SELECT DISTINCT left(date,7) AS month FROM data ORDER BY month DESC");
    if (!$result4) {
        echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;

        exit(mysqli_error($db));
    }
    if (mysqli_num_rows($result4) > 0) {
        $myrow4 = mysqli_fetch_array($result4);

        do {
            printf("<p class='point'><img src='img/arr3.jpg' height='10px' width='10px'>&nbsp;&nbsp;<a class='nav_link' href='view_date.php?date=%s'>%s</a></p>",$myrow4['month'], $myrow4['month']);
        }
        while ($myrow4 = mysqli_fetch_array($result4));
    }
    else {
        echo "<p>There is no data in the database</p>";
        exit();
    }
    ?>


    <div class="nav_title">Useful sites</div>
    <?php
    $result5 = mysqli_query($db, "SELECT title, link FROM friends");
    if (!$result5) {
        echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;

        exit(mysqli_error($db));
    }
    if (mysqli_num_rows($result5) > 0) {
        $myrow5 = mysqli_fetch_array($result5);

        do {
            printf("<p class='point'><img src='img/arr4.jpg' height='10px' width='10px'>&nbsp;&nbsp;<a class='nav_link' href='%s' target='_blank'>%s</a></p>",$myrow5['link'], $myrow5['title']);
        }
        while ($myrow5 = mysqli_fetch_array($result5));
    }
    else {
        echo "<p>There is no data in the database</p>";
        exit();
    }
    ?>
    <div class="nav_title">Search</div>

    <div class="search"><form method="post" action="view_search.php" name="form_s">
            <p class="search_t">You should enter more than 4 symbols for your search request.</p>
            <p><input type="text" name="search" size="20" maxlength="40" class="btn btn-default"></p>
                <input type="submit" class="search_b btn btn-info" name="submit_s" value="search">
        </form>
    </div>
    <p><a href="secret.php">Secret section</a></p>

    <div class="nav_title">Statistics</div>
   <?php
    $result10 = mysqli_query ($db,"SELECT COUNT(*) FROM data");
    $sum = mysqli_fetch_array($result10);

    $result11 = mysqli_query ($db,"SELECT COUNT(*) FROM comments");
    $sum2 = mysqli_fetch_array($result11);
    echo "<p class='comments'>Number of posts: $sum[0]<br>Number of comments: $sum2[0]</p>"
?>
</div>