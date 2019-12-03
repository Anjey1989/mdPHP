<?php
    require("head.php");

    if (! isset($_SESSION['user_id'])) {
        header('Location: index.php');
    }

    require('header.php');
?>

<div class="row">
    <div class="col-6">

    </div>
    <div class="col-6">
        <div class="alert alert-success" role="alert">
            Paldies, Tu esi reģistrējies! <br />
            Pārbaudi epastu un apstiprini reģistrāciju.
        </div>
    </div>
</div>

<?php require('footer.php'); ?>
