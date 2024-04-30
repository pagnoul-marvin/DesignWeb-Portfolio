<?php

$config = parse_ini_file('../.env.local.ini');

$dbname = $config['DB_NAME'];
$username = $config['DB_USER'];
$password = $config['DB_PASSWORD'];
$host = $config['DB_HOST'];

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!Validator::min('firstname', 3)) {
        $errors['firstname'] = 'Le prénom doit avoir une longueur minimale de 3 caractères.';
    }

    if (!Validator::emailContainsAtSymbol($_REQUEST['email'])) {
        $errors['email'] = 'L\'adresse e-mail doit contenir un "@".';
    }

    $requiredFields = ['firstname', 'lastname', 'email', 'message'];
    foreach ($requiredFields as $field) {
        if (!Validator::required($field)) {
            $errors[$field] = ucfirst($field) . ' est requis.';
        }
    }
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "La connexion à la base de données a bien été établie";
} catch (PDOException $e) {
    echo "La connexion à la base de données a échoué: " . $e->getMessage();
}

if (isset($_POST['envoyer'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $email = $_POST['mail'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `wp_contact_form_entries` (`firstname`, `lastname`, `gender`, `email`, `message`) VALUES (:firstname, :lastname, :gender, :email, :message)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

    $to = "marvinpagnoul@icloud.com";
    $subject = "Nouveau formulaire de contact soumis";
    $message = "Un nouveau formulaire de contact a été soumis avec les informations suivantes:\n\n";
    $message .= "Prénom: $firstname\n";
    $message .= "Nom: $lastname\n";
    $message .= "Genre: $gender\n";
    $message .= "E-mail: $email\n";
    $message .= "Sujet: $subject\n";
    $headers = "From: Mon Site portfolio\r\n";
    $headers .= "Reply-To: $email\r\n";
    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        echo "E-mail envoyé avec succès.";
    } else {
        echo "Échec de l'envoi de l'e-mail.";
    }
}