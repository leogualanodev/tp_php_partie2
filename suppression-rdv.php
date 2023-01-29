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
        $dateHour = $_GET["dateHour"];

        $connect = connexion();
        $stmt = $connect->prepare("DELETE FROM appointments WHERE dateHour = '$dateHour'");
        $stmt->execute();

        header ("location: liste-rendezvous.php?id=$dateHour");
    ?>
</body>
</html>