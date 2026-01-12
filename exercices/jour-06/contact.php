<?php
    $name= htmlspecialchars($_POST['name'] ?? '');
    $mail = htmlspecialchars($_POST['email']?? '');
    $message = htmlspecialchars($_POST['message' ?? '']);
    if(!empty($name) && !empty($mail) && !empty($message)) {
        echo $name."<br>";
        if (!filter_var($mail,FILTER_VALIDATE_EMAIL)) { 
            echo "Email invalide <br>";
        }
        else
            echo $mail."<br>";
        if(strlen($message) >= 10)
            echo $message."<br>";
        else
            echo "La taille du message est incorrecte ! <br>";
    }
    else    
        echo "Tous les champs sont requis ! <br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formContact</title>
</head>
<body>
     <div class="contact-layout">
            <div class="contact-form">
                <h2 class="contact-form__title">Envoyez-nous un message</h2>
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label form-label--required">Nom complet</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="form-input"
                            placeholder="Votre nom"
                            minlength="2"
                        >
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label form-label--required">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="votre@email.com"
                            
                        >
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label form-label--required">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            class="form-textarea"
                            placeholder="Décrivez votre demande..."
                            rows="6"
                        ></textarea>
                        <p class="form-hint">Minimum 10 caractères</p>
                    </div>

                    <button type="submit" class="btn btn--primary btn--lg">
                        Envoyer le message
                    </button>

                </form>
            </div>
</body>
</html>