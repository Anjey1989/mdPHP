<?php
    function validate_email($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    function show_error($text) {
        header('Location: index.php?error=' . $text);

        exit;
    }
