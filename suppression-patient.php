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
        
        $connect = connexion();
        $stmt = $connect->prepare("DELETE patients  FROM patients LEFT JOIN appointments ON patients.id = appointments.idPatients WHERE patients.id=$id");
        $stmt->execute();


        header ("location: liste-patients.php?id=$id");

        

    ?>
</body>
</html>