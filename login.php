<?php
    require("head.php");

    $email = $_POST['emails'];
    $password = md5($_POST['password']);

    if (! validate_email($email)) {
        show_error('Nekorekti ievadīta e-pasta adrese');
    }

    $user = User::get($email);

    if ($user === null) {
        show_error('Lietotājs ar tādu e-pasta adresei neeksistē');
    }

    if (! $user->validPassword($password)) {
        show_error('Nepareiza parole');
    }

    $_SESSION['user_id'] = $email;

    header('Location: user.php');

?>
