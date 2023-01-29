<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style2.css">
</head>
<body>
    <?php

        include 'fonction.php';
        $id = $_GET["id"];

        $connect = connexion();


        $stmt = $connect->prepare("SELECT * FROM appointments INNER JOIN patients WHERE appointments.idPatients = $id AND patients.id = $id ORDER BY dateHour ASC");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        

        echo "<h3> les différents rendez-vous : </h3>";
        for ($i=0 ; $i < count($data) ; $i++){
            echo "Rdv ".$i." : ".$data[$i]["dateHour"]."<br>" ;
        }
        echo "<h3> les Informations du patient  : </h3><div><p> <strong>Nom :</strong> ".$data[0]["lastname"]."</p><p><strong> Prénom :</strong> ".$data[0]["firstname"]."</p><p> <strong>Email :</strong> ".$data[0]["mail"]."</p><p><strong> Telephone :</strong> ".$data[0]["phone"]."</p><p><strong> Date de Naissance :</strong> ".$data[0]["birthdate"]."</p></div>";

        echo "<h3> modification des rendez-vous : </h3>";

        if (isset($_GET["erreur"]) === true ){
            echo "Aucune valeur rentré pour la modification";
        }

        echo "  <form action='traitement-modifrdv.php?id=".$id."'' method='post'>
                    <select name='option'>";

        for ($i = 0 ; $i < count($data) ; $i++){
            echo "<option value='".$data[$i]["dateHour"]."'> Rdv".$i."</option>";
        }

        echo "</select>";

        echo "  <input type='time' name='time'>
                <input type='date' name='date'>
                <input type='submit' value='modifier'>
                </form>";
                  

    ?>
</body>
</html>