<?php

namespace Core;

use JetBrains\PhpStorm\NoReturn;
use PDO;
use PDOException;
use Validator\Validator;

class Database extends PDO
{
    private string $database_name;
    private bool $formSubmittedSuccessfully;
    private array $errors;
    private array $requiredFields;

    private PDO $conn;

    public function __construct(string $ini_path)
    {
        if (file_exists($ini_path)) {
            $config = parse_ini_file($ini_path);
            $driver = $config['DB_DRIVER'];
            $host = $config['DB_HOST'];
            $this->database_name = $config['DB_NAME'];
            $username = $config['DB_USER'];
            $password = $config['DB_PASSWORD'];
            $port = $config['DB_PORT'];
            $charset = $config['DB_CHARSET'];
        } else {
            $this->redirectToErrorPage();
        }

        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $driver,
            $host,
            $port,
            $this->database_name,
            $charset
        );

        $this->formSubmittedSuccessfully = false;
        $this->errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $this->formSubmittedSuccessfully = true;

            if (!Validator::min('firstname', 3)) {
                $this->errors['firstname'] = 'Le prénom doit avoir une longueur minimale de 3 caractères.';
            }

            if (!Validator::min('lastname', 3)) {
                $this->errors['lastname'] = 'Le nom doit avoir une longueur minimale de 3 caractères.';
            }

            if (!Validator::validateEmail($_POST['mail'])) {
                $this->errors['mail'] = 'L\'adresse e-mail n\'est pas valide.';
            }

            if (!Validator::emailContainsAtSymbol($_REQUEST['mail'])) {
                $this->errors['mail'] = 'L\'adresse e-mail doit contenir un "@".';
            }

            $this->requiredFields = ['firstname', 'lastname', 'mail', 'message'];
            foreach ($this->requiredFields as $field) {
                if (!Validator::required($field)) {
                    $this->errors[$field] = ucfirst($field) . ' est requis.';
                }
            }

            if (empty($this->errors)) {

                try {
                    parent::__construct($dsn, $username, $password);
                    $this->conn = $this;
                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $firstname = htmlspecialchars($_POST['firstname']); //htmlspecialchars() permet d'échapper les caractères spéciaux pour éviter toutes injections potentielles.
                    $lastname = htmlspecialchars($_POST['lastname']);
                    $gender = htmlspecialchars($_POST['gender']);
                    $email = htmlspecialchars($_POST['mail']);
                    $message = htmlspecialchars($_POST['message']);

                    $sql = "INSERT INTO `wp_contact_form_entries` (`firstname`, `lastname`, `gender`, `email`, `message`) VALUES (:firstname, :lastname, :gender, :email, :message)";
                    $stmt = $this->conn->prepare($sql);

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
                } catch (PDOException) {
                    $this->redirectToErrorPage();
                }
            }
        }
    }

    public function getFormSubmittedSuccessfully(): bool
    {
        return $this->formSubmittedSuccessfully;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    #[NoReturn] private function redirectToErrorPage(): void
    {
        wp_redirect(home_url('me_contacter/un-probleme-est-survenu'));
        die();
    }
}