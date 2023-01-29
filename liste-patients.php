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
        echo "<a href='./ajout-patient.php'> Ajouter un Patient </a><br>";
        if (isset($_GET["id"])){
            echo "le patient ".$_GET["id"]." a bien été supprimé";
        }
        echo "  <div class='patient'>
                    <div class='menu'>Numéro Patient</div>
                    <div class='menu'>Nom Patient</div>
                    <div class='menu'>Prénom Patient</div>
                </div>";

        $connect = connexion();

        $stmt = $connect->prepare("SELECT * FROM patients");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        for ($i=0 ; $i < count($data) ; $i++){
            echo "  <div class='patient'>
                        <div class='info'><a href='profil-patients.php?id=".$data[$i]["id"]."'>info</a> ".$data[$i]["id"]."<form action='suppression-patient.php?id=".$data[$i]["id"]."' method='post'><input type='submit' value='supprimer'></form></div>
                        <div class='info'>".$data[$i]["lastname"]."</div>
                        <div class='info'>".$data[$i]["firstname"]."</div>
                    </div>";
        }
    ?>
</body>
</html>