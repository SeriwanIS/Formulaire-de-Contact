<?php

$error = null;
$succes = null;
$email = null;

if(!empty($_POST))
{
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $succes = "Vous avez bien été enregistré.";
        $email = null;
    } else{
        $error = "Merci d'entrer un mail valide.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Nous contacter</title>
        <link rel="stylesheet" href="stylecontact.css?v=<?php echo time(); ?>">
    </head>
    <body>
    <?php require 'header.php' ?>

    <section class="milieu-presentation">
        <img class="imageTigre" src="images/tigre.png">
        <img class="imageContact" src="images/contact2.png">
        <img class="avion" src="images/avion.png">
        <div class="titre-Aprops">
            <h1 class="Apropos">Contact</h1>
            <div class="contact-info-div">
                <p class="Contact-info"> 📝 +33 6 65 47 00 27</p>
                <p class="Contact-info2"> 📝 contact@nnk.paris</p>
            </div>
        </div>
    </section>
    
    <section class="fin-presentation">
        <div class="div-fin-presentation">
            <h1 class="newsletter-titre1">Abonnez-vous à</h1>
            <h1 class="newsletter-titre2">notre newsletter !</h1>
            <div class="presentation-newsletter">
            <p class="paragraphe-presentation">Inscrivez-vous à notre newsletter pour être au courant de l'actualité et promotions<p>
            </div>  
        </div>
    </section>

    <div class="etat-enregistrement">
    <?php if($error): ?>
    <?php echo $error; ?>
    <?php endif ?>

    <?php if($succes): ?>
        <?php echo $succes; ?>
    <?php endif ?>
    </div>
    
    <section class="newsletter-inscription">
    <form action="/NNK/contact.php" method="POST" class="form-1">   
    <div class="form-1-group">
        <input type="email" name="email" class="email" placeholder="Votre email" required value="<?php echo htmlentities($email) ?>">
        <button type="submit" class="bouton-valider-inscription" >S'inscrire</button> 
    </div>
    </form>
    </section>

    <?php require 'footer.php' ?>
    </body>
</html>