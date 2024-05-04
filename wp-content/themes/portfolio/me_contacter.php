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

            // Envoyer l'email
            $to = "marvinpagnoul@icloud.com";
            $subject = "Nouveau formulaire de contact soumis";
            $message = "Un nouveau formulaire de contact a été soumis avec les informations suivantes:\n\n";
            $message .= "Prénom: $firstname\n";
            $message .= "Nom: $lastname\n";
            $message .= "Genre: $gender\n";
            $message .= "E-mail: $email\n";
            $message .= "Sujet: $subject\n";
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $mailSent = mail($to, $subject, $message, $headers);

        } catch (PDOException $e) {
            echo "La connexion à la base de données a échoué: " . $e->getMessage();
        }
    }
}
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php get_header(); ?>

    <main>

        <input type="checkbox" id="toggle" class="<?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
        <label for="toggle" class="pages_button no_text_decoration <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">Aller vers la page Me contacter</label>

        <section id="decoration" class="decoration <?= give_decoration_class(); ?> <?= $formSubmittedSuccessfully ? 'no_display' : ''; ?>">
            <h2>Bienvenue en Gr&egrave;ce&nbsp;!</h2>
            <div id="greece_decoration" class="decorate"></div>
        </section>

        <?= get_the_content(); ?>

        <section id="mail_contact" class="section">

            <?php component('global.titles.second_title', [
                'class' => '',
                'text' => 'Par mail'
            ]); ?>

            <form action="" method="POST" id="mail_contact_form">

                <fieldset>

                    <legend>Formulaire de contact par mail</legend>
                    <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                    <?php component('global.forms.labels_and_inputs.text_input', [
                        'link' => 'firstname',
                        'label_text' => 'Votre pr&eacute;nom * <small>3 caract&egrave;res minimum sont requis.</small>',
                        'input_name' => 'firstname',
                        'input_placeholder' => 'Exemple: Jules',
                        'required' => 'required',
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
                    ]); ?>

                    <?php if (isset($errors['message'])) { ?>
                        <p class="validation_errors"><?= $errors['message'] ?></p>
                    <?php } ?>

                    <?php component('global.forms.labels_and_inputs.submit_input', [
                        'input_text' => 'Envoyer le formulaire'
                    ]); ?>

                </fieldset>

            </form>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) { ?>
                <div id="validate">
                    <p>Votre mail a bien &eacute;t&eacute; envoy&eacute;&nbsp;! Je vous r&eacute;pondrais le plus
                        rapidement possible.</p>
                </div>
            <?php } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($errors)) { ?>
                <div id="not_validate">
                    <p>Votre mail n&rsquo;a pas &eacute;t&eacute; envoy&eacute;&nbsp;! Un ou plusieurs champ(s) ne
                        respecte(nt) pas les r&egrave;gles.</p>
                </div>
            <?php } ?>

        </section>

    </main>

    <?php get_footer(); ?>

<?php endwhile; endif; ?>