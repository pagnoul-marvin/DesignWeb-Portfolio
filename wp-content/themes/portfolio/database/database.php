<?php

if (file_exists(__DIR__ . '/Validator.php')) {
    require_once(__DIR__ . '/Validator.php');
} else {
    wp_redirect(home_url('me_contacter/un-probleme-est-survenu'));
    die();

}

if (file_exists(__DIR__ . '/../.env.local.ini')) {
    $config = parse_ini_file(__DIR__ . '/../.env.local.ini');
} else {
    wp_redirect(home_url('me_contacter/un-probleme-est-survenu'));
    die();
}

$dbname = $config['DB_NAME'];
$username = $config['DB_USER'];
$password = $config['DB_PASSWORD'];
$host = $config['DB_HOST'];
$formSubmittedSuccessfully = '';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $formSubmittedSuccessfully = true;

    if (!Validator::min('firstname', 3)) {
        $errors['firstname'] = 'Le prénom doit avoir une longueur minimale de 3 caractères.';
    }

    if (!Validator::min('lastname', 3)) {
        $errors['lastname'] = 'Le nom doit avoir une longueur minimale de 3 caractères.';
    }

    if (!Validator::validateEmail($_POST['mail'])) {
        $errors['mail'] = 'L\'adresse e-mail n\'est pas valide.';
    }

    if (!Validator::emailContainsAtSymbol($_REQUEST['mail'])) {
        $errors['mail'] = 'L\'adresse e-mail doit contenir un "@".';
    }

    $requiredFields = ['firstname', 'lastname', 'mail', 'message'];
    foreach ($requiredFields as $field) {
        if (!Validator::required($field)) {
            $errors[$field] = ucfirst($field) . ' est requis.';
        }
    }

    if (empty($errors)) {

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $firstname = htmlspecialchars($_POST['firstname']); //htmlspecialchars() permet d'échapper les caractères spéciaux pour éviter toutes injections potentielles.
            $lastname = htmlspecialchars($_POST['lastname']);
            $gender = htmlspecialchars($_POST['gender']);
            $email = htmlspecialchars($_POST['mail']);
            $message = htmlspecialchars($_POST['message']);

            $sql = "INSERT INTO `wp_contact_form_entries` (`firstname`, `lastname`, `gender`, `email`, `message`) VALUES (:firstname, :lastname, :gender, :email, :message)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            // Envoyer l'email
            $message = htmlspecialchars_decode($message);
            $to = "marvinpagnoul@icloud.com";
            $subject = "Nouveau formulaire de contact soumis";
            $body = "Un nouveau formulaire de contact a été soumis avec les informations suivantes:\n\n";
            $body .= "Prénom: $firstname\n";
            $body .= "Nom: $lastname\n";
            $body .= "Genre: $gender\n";
            $body .= "E-mail: $email\n";
            $body .= "Sujet: $message\n";
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            wp_mail($to, $subject, $body, $headers);

        } catch (PDOException $e) {
            die('La connexion à la base de données a échoué');
            //renvoyer à une page qui invite à contacter l'admin
        }
    }
}