<?php
/*
Template Name: Me contacter
*/
?>

<?php
require_once('database/Validator.php');
$config = parse_ini_file('.env.local.ini');

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
            $message = $_POST['message'];

            $sql = "INSERT INTO `wp_contact_form_entries` (`firstname`, `lastname`, `gender`, `email`, `message`) VALUES (:firstname, :lastname, :gender, :email, :message)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            $stmt->execute();

            // Envoyer l'email
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
            echo "La connexion à la base de données a échoué: " . $e->getMessage();
        }
    }
}
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <?php component('global.no_js_banner.banner') ?>

        <input type="checkbox" id="toggle" class="<?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
        <label for="toggle"
               class="pages_button no_text_decoration <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">Aller vers
            la page Me contacter</label>

        <section id="decoration"
                 class="decoration <?= give_decoration_class(); ?> <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
            <h2>Bienvenue en Gr&egrave;ce&nbsp;!</h2>
            <div id="greece_decoration" class="decorate"></div>
        </section>

        <?= get_the_content(); ?>

        <section id="mail_contact" class="section">

            <?php component('global.titles.second_title', [
                'class' => '',
                'text' => 'Par mail'
            ]); ?>

            <form action="http://site.test/me_contacter/" method="POST" id="mail_contact_form">

                <?php
                $firstname_input_value = '';
                $lastname_input_value = '';
                $mail_input_value = '';
                $message_textarea_value = '';
                if (isset($errors['firstname'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['lastname'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['mail'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                if (isset($errors['message'])) {
                    $firstname_input_value = $_POST['firstname'];
                    $lastname_input_value = $_POST['lastname'];
                    $mail_input_value = $_POST['mail'];
                    $message_textarea_value = $_POST['message'];
                }
                ?>

                <fieldset>

                    <legend>Formulaire de contact par mail</legend>
                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'firstname',
                        'label_text' => 'Votre pr&eacute;nom * <small>3 caract&egrave;res minimum sont requis.</small>',
                        'input_name' => 'firstname',
                        'input_placeholder' => 'Exemple: Jules',
                        'required' => 'required',
                        'input_value' => $firstname_input_value
                    ]); ?>

                    <?php if (isset($errors['firstname'])) { ?>
                        <p class="validation_errors"><?= $errors['firstname'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'lastname',
                        'label_text' => 'Votre nom * <small>3 caract&egrave;res minimum sont requis.</small>',
                        'input_name' => 'lastname',
                        'input_placeholder' => 'Exemple: César',
                        'required' => 'required',
                        'input_value' => $lastname_input_value
                    ]); ?>

                    <?php if (isset($errors['lastname'])) { ?>
                        <p class="validation_errors"><?= $errors['lastname'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.select_and_options', [
                        'link' => 'gender',
                        'label_text' => 'Votre genre',
                        'select_name' => 'gender',
                        'options' => array(
                            '' => 'Choisissez votre genre',
                            'male' => 'Homme',
                            'female' => 'Femme',
                            'other' => 'Autre',
                        )
                    ]);
                    ?>

                    <?php component('global.forms.labels_and_inputs.email_input', [
                        'link' => 'mail',
                        'label_text' => 'Votre adresse mail * <small>Le caract&egrave;re &laquo;&commat;&raquo; est requis.</small>',
                        'input_name' => 'mail',
                        'input_placeholder' => 'Exemple: julescesar@mail.com',
                        'required' => 'required',
                        'input_value' => $mail_input_value
                    ]); ?>

                    <?php if (isset($errors['email'])) { ?>
                        <p class="validation_errors"><?= $errors['email'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.textarea', [
                        'link' => 'message',
                        'label_text' => 'Pourquoi souhaitez-vous me contacter ? *',
                        'textarea_name' => 'message',
                        'textarea_placeholder' => 'Exemple: Je souhaite vous contacter pour avoir des informations sur un potentiel futur projet.',
                        'required' => 'required',
                        'message_text_if_error' => $message_textarea_value
                    ]); ?>

                    <?php if (isset($errors['message'])) { ?>
                        <p class="validation_errors"><?= $errors['message'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.labels_and_inputs.submit_input', [
                        'input_text' => 'Envoyer le formulaire'
                    ]); ?>

                </fieldset>

            </form>

        </section>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) { ?>
            <div id="validate">
                <p>Votre mail a bien &eacute;t&eacute; envoy&eacute;&nbsp;! Je vous recontacterai dans le plus bref
                    délais.</p>
            </div>
        <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) { ?>
            <div id="not_validate">
                <p>Votre mail n&rsquo;a pas &eacute;t&eacute; envoy&eacute;&nbsp;! Un ou plusieurs champ(s) ne
                    respecte(nt) pas les r&egrave;gles.</p>
            </div>
        <?php } ?>

    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>