<html>
<header>
    <h1>formulaire de contact</h1>
    <div class="nav">
        <ul>
            <il><a href="index.html">acceuil</a></il>
        </ul>
    </div>
</header>

<body>
    <form method="POST">
        <label for="nom de famille"> nom de famille</label>
        <input type="text" placeholder="" id="nomdefamille"></br>
        <label for="email"> email</label>
        <input type="email" placeholder="" id="email"></br>
        <label for="objet"> objet de la demande</label>
        <input type="text" placeholder="" id="objet"></br>
        <label for="message"> message </label>
        <textarea name="message" required></textarea></br>
        <input type="submit" value="Envoyer">
    </form>
    <?php
    // fonction d'envoi de mail 
    if (isset($_POST["message"])) {
        $retour = mail('clement.goguely@hotmail.fr', 'envoi test', 'envoie pour test', '');
        if ($retour) {
            echo "<p>le mail a eter envoyer</p>";
        }
    }

    ?>
</body>

</html>