<?php
    require_once 'config.php';

    function goUsr()
    {
        header("Location: http://saullayer67.ru/reviews.php");
        exit;
    }

    function gohome()
    {
        header("Location: http://saullayer67.ru/index.html");
        exit;
    }

    if (isset($_POST["addFeedback_btn"])) 
    {
        $dbconn = mysqli_connect($host, $user, $pass, $db)
        or die('Could not connect');
    
        /////////////////////////////////////////////////////////////////

        $name = $_POST["name"];
        $feedback = $_POST["user_feedback"];
        $tableName = "reviews";
        $data = "INSERT INTO " . $tableName . " (name, review) VALUES ('" . $name . "', '" . $feedback . "');";

        $result = mysqli_query($dbconn, $data);

        /////////////////////////////////////////////////////////////////

        mysqli_close($dbconn);

        goUsr();
    }
    else if (isset($_POST["backHP_btn"])) 
    {
        gohome();
    }
?>