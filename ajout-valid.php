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
    session_start();
    echo "vous avez bien rentré le client suivant dans la base de donnée :".$_SESSION["firstname"]." ".$_SESSION["lastname"]."<br> <a href='./ajout-patient.php'> Ajouter un nouveau patient</a>" ;

    
    
    ?>
</body>
</html>