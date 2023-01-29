<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style1.css">
</head>
<body>
    <?php
        include 'fonction.php';
        echo "<a href='./ajout-rendezvous.php'> Ajouter un Rendez-vous </a><br>";
        if (isset($_GET["id"])){
            echo "le rendez-vous du ".$_GET["id"]." a été supprimé ";
        }
        echo "  <div class='patient'>
                    <div class='menu'>Info Rendez-Vous</div>
                    <div class='menu'>Heure rdv </div>
                    <div class='menu'>Patient</div>
                </div>";

        $connect = connexion();
        $stmt = $connect->prepare("SELECT * FROM appointments INNER JOIN patients WHERE appointments.idPatients = patients.id ORDER BY dateHour ASC;");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        

        for ($i=0 ; $i < count($data) ; $i++){
            echo "  <div class='patient'>
                        <div class='info'><a href='rendezvous.php?id=".$data[$i]["id"]."'>info</a><form action='suppression-rdv.php?dateHour=".$data[$i]["dateHour"]."' method='post'><input type='submit' value='supprimer'></form></div>
                        <div class='info'>".$data[$i]["dateHour"]."</div>
                        <div class='info'><a href='profil-patients.php?id=".$data[$i]["id"]."'>info</a>".$data[$i]["firstname"]." ".$data[$i]["lastname"]."</div>
                    </div>";
        }

    ?>
</body>
</html>