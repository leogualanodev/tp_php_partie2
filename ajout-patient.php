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
    <form action="traitement-ajout.php" method="post">
        <?php if (isset($_GET["erreur"])){ ?>
            <div class="erreur">Veuillez remplir tous les champs</div>
        <?php } ?>
        <?php if (isset($_GET["erreur1"]) ==  "patient"){?>
            <div class="erreur">Ce patient existe deja</div>
        <?php } ?>
        <input type="text" name="firstname" placeholder="firstname">
        <input type="text" name="lastname" placeholder="lastname">
        <input type="date" name="date">
        <input type="text" name="phone" placeholder="phonenumber">
        <input type="email" name="email" placeholder="email">
        <input type="submit" value="ajouter">
    </form>


    



    
        
</body>
</html>