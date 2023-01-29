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

        
        if ((
            empty($_POST) && !isset($_POST["firstname"]) && !isset($_POST["lastname"]) && !isset($_POST["date"]) && !isset($_POST["time"]))
        || (
            empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["date"]) || empty($_POST["time"]))){

            header ('location: ajout-rendezvous.php?erreur=true');
        }

        DEFINE("DB_HOST" , "localhost");
        DEFINE("DB_USER" , "root");
        DEFINE("DB_PASSWORD" , "");
        DEFINE("DB_NAME" , "hospitale2n");

        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $date = $_POST["date"];
        $time = $_POST["time"];

        try {
            $connect =  new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME , DB_USER , DB_PASSWORD);
            $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo 'connection failed : '.$e->getMessage();
        }
        
        $stmt = $connect->prepare("SELECT * FROM patients");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        function verifId ($data){
            $result = 0 ;
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            for ( $i = 0 ; $i < count($data) ; $i++ ) {
                if ( $firstname === $data[$i]["firstname"] ){
                    if( $lastname === $data[$i]["lastname"]){
                        $result = $data[$i]["id"];
                    }
                }
            }
            return $result ;
        }
        $id = verifId($data) ;
        if ( $id === 0){
            header ('location: ajout-rendezvous.php?erreur1=true');
        } else {
            try {
                $connect =  new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME , DB_USER , DB_PASSWORD);
                $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e){
                echo 'connection failed : '.$e->getMessage();
            }
            
            $dateTime = "$date"." "."$time".":00"; 
            
            $stmt = $connect->prepare("INSERT INTO appointments ( dateHour , idPatients ) VALUES ( '$dateTime' ,  $id )");
            $stmt->execute();
            header ('location: ajout-rendezvous.php?ajout=ok');

        }


        // pas réussi a optimiser mon code avec include ==> erreur que j'arrive pas a résoudre 

        





    ?>
</body>
</html>