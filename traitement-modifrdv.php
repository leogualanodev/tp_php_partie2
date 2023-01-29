<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        include 'fonction.php';

        $id = $_GET["id"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $dateHour = $_POST["option"];
        $dateTime = "$date"." "."$time".":00";
        
        if ( (!isset($_POST["time"]) && !isset($_POST["date"])) || ( empty($_POST["date"]) || empty($_POST["time"]))){
            header ( "location: rendezvous.php?id=$id");
        }

        $connect = connexion();
        $stmt = $connect->prepare("UPDATE appointments SET dateHour = '$dateTime' WHERE dateHour = '$dateHour' ");
        $stmt->execute();

        header ("location: rendezvous.php?id=$id");


    ?>
</body>
</html>