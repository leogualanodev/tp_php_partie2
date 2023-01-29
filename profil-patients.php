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
        $id = $_GET["id"] ;
        $connect = connexion();
        $stmt = $connect->prepare("SELECT * FROM patients INNER JOIN appointments ON patients.id=$id AND appointments.idPatients = $id");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        

        echo "<div><p> <strong>Nom :</strong> ".$data[0]["lastname"]."</p><p><strong> Prénom :</strong> ".$data[0]["firstname"]."</p><p> <strong>Email :</strong> ".$data[0]["mail"]."</p><p><strong> Telephone :</strong> ".$data[0]["phone"]."</p><p><strong> Date de Naissance :</strong> ".$data[0]["birthdate"]."</p><p><strong>Rendez-vous du Patient :</strong></p>"; 

        for ($i=0 ; $i < count($data) ; $i++){
            echo " - ".$data[$i]["dateHour"]."<br>";
        }
        echo "</div>";

        echo "<h3> modification des informations du patient : </h3>";

        echo "  <form action='traitement-modif.php?id=".$id."'' method='post'>
                    

                    <input type='text' name='firstname' value='".$data[0]["firstname"]."'>
                    <input type='text' name='lastname' value='".$data[0]["lastname"]."'>
                    <input type='date' name='date' value='".$data[0]["birthdate"]."'>
                    <input type='text' name='phone' value='".$data[0]["phone"]."'>
                    <input type='email' name='email' value='".$data[0]["mail"]."'>
                    <input type='submit' value='Modifier'>
                </form>";
       
       
    ?>
</body>
</html>