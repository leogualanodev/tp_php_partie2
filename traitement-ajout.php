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
        // sécurité pour l'acces a la page de traitement , et des infos rentré par l'user 


        include 'fonction.php';
        session_start();
        if (( 
            empty($_POST) && !isset($_POST["firstname"]) && !isset($_POST["lastname"]) && !isset($_POST["date"]) && !isset($_POST["phone"]) && !isset($_POST["email"]))
        || (
            empty($_POST["firstname"]) || empty($_POST["lastname"]) ||empty($_POST["date"]) || empty($_POST["phone"]) || empty($_POST["email"]))){

            header ('location: ajout-patient.php?erreur=true');
        }

    
        $connect = connexion();
        $stmt= $connect->prepare("SELECT * FROM patients ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        inscription($data);


    ?>
</body>
</html>