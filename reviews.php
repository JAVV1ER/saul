<?php
    require_once 'assets/php/config.php';
    
    $dbconn = mysqli_connect($host, $user, $pass, $db)
    or die('Could not connect');

    /////////////////////////////////////////////////////////////////

    $data = "SELECT `name`, `review` FROM `reviews`;";

    $result = mysqli_query($dbconn, $data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Бюро Сола Гудмана</title>
    <link rel="stylesheet" href="index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Lobster&family=Scada&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital@1&display=swap" rel="stylesheet">
</head>

    <body class="body_all">
        <div class="box">
        <div class="header_background">
            <ul>
                <li class="header__menu">
                    <a href="index.html" class="a__menu">Парадная</a>
                </li>
                <li class="header__menu">
                    <a href="who.html" class="a__menu">Обо мне</a>
                </li>
                <li class="header__menu">
                    <a href="price.html" class="a__menu">Прейскурант</a>
                </li>
                <li class="header__menu">
                    <a href="reviews.php" class="a__menu">Отзывы</a>
                </li>
                <li class="header__menu">
                    <a href="contact.html" class="a__menu">Контакты</a>
                </li>
                <li class="header__menu">
                    <a href="portfolio.html" class="a__menu">Портфолио</a>
                </li>
            </ul>
        </div>
        <div class="header__title">
            <h1>
                Адвокатское бюро
                <font class="saul"  face="Caveat" color="Red">Сола
                <font  size="9" face="Caveat" color="yellow">Гудмана
            </h1>
        </div>
    </div>

    <?php 
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
    ?>
        <h4 class="review__text"> <font color="red">
            <?php
                echo $row["name"];
            ?>
        </h4>
        <p class="review__text">
            <?php
                echo $row["review"];
            ?>
        </p> 
    <?php
            }
        }
        mysqli_close($dbconn);
    ?>

    <form class="review__form" method="POST" action="/assets/php/redirect.php">
        <div class="feedback__content">
            <div class="feedback__name">
                <label class="feedback__name-text">Имя: </label>
                <br/>
                <input type="text" name="name" class="feedback_name" placeholder="Введите ваше имя">
            </div>

            <div class="feedback__text">
                <label class="feedback__text-text">Отзыв: </label>
                <br/>
                <textarea type="text" name="user_feedback" class="user_feedback_text" placeholder="Оставьте ваш отзыв"></textarea>
            </div>

            <div class="form__btn">
                <button class="header__menu" style="font-size: 40px;" type="submit" value="add" name="addFeedback_btn">Оставить свой отзыв!</button>
                <button class="header__menu" style="font-size: 40px;" type="submit" value="goHomepage" name="backHP_btn">На главную</button>
            </div>
        </div>
    </form>

    <br>

    <div id="container">
        <div class="call__me" >
            <a href="calling.html" class="call__me2">Позвони прямо сейчас</a>
        </div>
        <div id="box"></div>
    </div>
</body>
</html>