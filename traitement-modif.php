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
        $prenom = $_POST["firstname"];
        $nom = $_POST['lastname'];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];

        

        $connect = connexion();

        $stmt = $connect->prepare("UPDATE patients SET lastname = '$nom' , firstname = '$prenom' , birthdate = '$date' , phone = '$phone' , mail = '$email' WHERE id='$id'");

        $stmt->execute();

        header ("location: profil-patients.php?id=$id");
    ?>
</body>
</html>