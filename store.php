<?php
    require("head.php");


    $email = $_POST['emails'];
    $password = $_POST['password'];
    $repeat = $_POST['password_repeat'];

    if (! validate_email($email)) {
        show_error('Nekorekti ievadīta e-pasta adrese');
    }

    if ($password !== $repeat) {
        show_error('Paroles nesakrīt');
    }

    if (strlen($password) < 5) {
        show_error('Parole ir par īsu');
    }

    if (! isset($_POST['agreement'])) {
        show_error('Obligāti jāpiekrīt noteikumiem');
    }

    if ($_POST['agreement'] !== 'on') {
        show_error('Obligāti jāpiekrīt noteikumiem');
    }

    $success = User::insert($email, md5($password));

    if ($success) {
        $_SESSION['user_id'] = $email;
        header('Location: success.php?success=1');
    } else {
        show_error('Problēma ar datubāzi');
    }

?>
