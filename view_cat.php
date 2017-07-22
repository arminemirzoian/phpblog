<?php
include("blocks/db.php");
if (isset($_GET['cat'])) {
    $cat = $_GET['cat'];
    if (!isset($cat)) {
        $cat = 1;
    }
}
if (isset($_GET['q_vote'])) {
    $q_vote = $_GET['q_vote'];
    if (!isset($q_vote)) {
        $q_vote = 1;
    }
}
if (!preg_match('|^[\d]+$|', $cat))
{
    exit ("<p>Incorrect query. Please, check the URL!</p>");
}
$result = mysqli_query($db, "SELECT * FROM categories WHERE id='$cat'");
if (!$result) {
    echo "<p>The query from the database was not done, please contact your administrator via email: arminemirzoian@gmail.com </p>
    <br>Code of the mistake is:" ;
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
    <?php echo " Notes of the category $myrow[title]";?>
</title>
<meta name="description" content="<?php echo $myrow["meta_d"];?>">
<meta name="keywords" content="<?php echo $myrow["meta_k"];?>">
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
            <?php echo $myrow['text']; ?>
            <?php
            $result77 = mysqli_query($db,"SELECT str FROM options");
            $myrow77 = mysqli_fetch_array($result77);
            $num = $myrow77["str"];
            // Извлекаем из URL текущую страницу
            @$page = $_GET['page'];
            // Определяем общее число сообщений в базе данных
            $result00 = mysqli_query($db,"SELECT COUNT(*) FROM data WHERE secret=0 AND cat='$cat'");
            $temp = mysqli_fetch_array($result00);
            $posts = $temp[0];
            // Находим общее число страниц else

            $total = (($posts - 1) / $num) + 1;
            $total =  intval($total);
            // Определяем начало сообщений для текущей страницы
            $page = intval($page);
            // Если значение $page меньше единицы или отрицательно
            // переходим на первую страницу
            // А если слишком большое, то переходим на последнюю
            if(empty($page) or $page < 0) $page = 1;
            if($page > $total) $page = $total;
            // Вычисляем начиная с какого номера
            // следует выводить сообщения
            $start = $page * $num - $num;
            // Выбираем $num сообщений начиная с номера $start
            $result = mysqli_query($db,"SELECT id,title,description,date,author,mini_img,view, rating, q_vote FROM data WHERE secret=0 AND cat='$cat' ORDER BY id LIMIT $start, $num");

            if (!$result)
            {
                exit ("<p>No information to show!") ;
            }
            if (mysqli_num_rows($result) > 0)
            {
                $myrow = mysqli_fetch_array($result);
                do {
                    $r = $myrow['rating']/$myrow['q_vote'];
                    $r = intval($r);
                    printf(
                        "<table class='post' align = 'center'>
                <tr>
                    <td class='post_title'> 
                    <p class='post_name'><img class='mini' align='left' src='%s'><a href='view_post.php?id=%s'>%s</a></p>
                    <p class='post_adds'>Creation date: %s</p>
                    <p class='post_adds'>Author of the lesson: %s</p></td >
                </tr >
                <tr >
                    <td>%s <p class='post_view'>Views: %s &nbsp;&nbsp;&nbsp; Rating: <img src='img/%s.gif'></p></td>
                </tr >
            </table ><br><br>", $myrow['mini_img'],$myrow['id'], $myrow['title'], $myrow['date'], $myrow['author'], $myrow['description'], $myrow['view'], $r);
                }
                while (
                    $myrow = mysqli_fetch_array($result)
                );



                // Проверяем нужны ли стрелки назад
                if ($page != 1) $pervpage = '<a href=view_cat.php?cat='.$cat.'&page=1>First</a> | <a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>Previous</a> | ';
// Проверяем нужны ли стрелки вперед
                if ($page != $total) $nextpage = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>Next</a> | <a href=view_cat.php?cat='.$cat.'&page=' .$total. '>Last</a>';

// Находим две ближайшие станицы с обоих краев, если они есть
                if($page - 5 > 0) $page5left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
                if($page - 4 > 0) $page4left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
                if($page - 3 > 0) $page3left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
                if($page - 2 > 0) $page2left = ' <a href=view_cat.php?cat='.$cat.'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
                if($page - 1 > 0) $page1left = '<a href=view_cat.php?cat='.$cat.'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

                if($page + 5 <= $total) $page5right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 5) .'>'. ($page + 5) .'</a>';
                if($page + 4 <= $total) $page4right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 4) .'>'. ($page + 4) .'</a>';
                if($page + 3 <= $total) $page3right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 3) .'>'. ($page + 3) .'</a>';
                if($page + 2 <= $total) $page2right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
                if($page + 1 <= $total) $page1right = ' | <a href=view_cat.php?cat='.$cat.'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню если страниц больше одной

                if ($total > 1)
                {
                    Error_Reporting(E_ALL & ~E_NOTICE);
                    echo "<div class='pstrnav'>";
                    echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;
                    echo "</div>";
                }

            }

            else
            {
                echo "<p>There is no information in the database about this post.</p>";
                exit();
            }
            ?>
        </div>
    </div>
    <?php include ("blocks/footer.php") ?>
</div>