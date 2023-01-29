<?php

function connexion(){
    DEFINE("DB_HOST" , "localhost");
    DEFINE("DB_USER" , "root");
    DEFINE("DB_PASSWORD" , "");
    DEFINE("DB_NAME" , "hospitale2n");

    try {
        $connect =  new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME , DB_USER , DB_PASSWORD);
        $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        echo 'connection failed : '.$e->getMessage();
    }

    return $connect ;
}

function verifClient($data){
    $result = true ;
    for ( $i = 0 ; $i < count($data) ; $i++){
        if( $_POST["email"] == $data[$i]["mail"]){
            $result = false ;
        } else {
            $result = true ;
        }
    }
    return $result ;
}

function inscription($data){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mail = $_POST["email"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];


    if ( verifClient($data) == true ){

        try {
            $connect1 =  new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME , DB_USER , DB_PASSWORD);
            $connect1->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo 'connection failed : '.$e->getMessage();
        }


        $stmt1 = $connect1->prepare("INSERT INTO patients (lastname , firstname , birthdate , phone , mail) VALUES ( '$lastname' , '$firstname' , '$date' , '$phone' , '$mail' ) ");
        $stmt1->execute();


        $_SESSION["email"] = $mail ;
        $_SESSION["phone"] = $phone ;
        $_SESSION["date"] = $date ;
        $_SESSION["firstname"] = $firstname ;
        $_SESSION["lastname"] = $lastname ;

        header ('location: ajout-valid.php');
    } else {
        header ('location: ajout-patient.php?erreur1=patient');
    }
}
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

?>