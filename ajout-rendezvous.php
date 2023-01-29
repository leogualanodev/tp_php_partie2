<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <form action='traitement-rdv.php' method='post'>
        <?php if(isset($_GET["erreur"]) === true ){ ?>
            <div class="erreur">veuillez rentrez toute les information pour le client</div>
        <?php
         }
         if (isset($_GET["erreur1"]) === true){
         ?>
         <div class="erreur">Ce patient n'existe pas!</div>
         <?php } 
          if(isset($_GET["ajout"]) === "ok"){ ?>
            <div class="erreur">Rdv ajouté</div>
            <?php } ?>
        <input type='text' name='firstname' placeholder='prénom'>
        <input type='text' name='lastname' placeholder='nom'>
        <input type='date' name='date'>
        <input type='time' name='time'>
        <input type='submit' value='Ajouter rdv'>
    </form>
</body>
</html>