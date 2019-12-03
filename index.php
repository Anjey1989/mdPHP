<?php
    require_once("head.php");
    require('layout/header.php');
?>

<div class="row">
    <div class="col-6">
        <h2>Ielogoties</h2>

        <form action="login.php" method="post">
            <div class="form-group">
                <label>Email address</label>
                <input name="emails" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class="col-6">
        <h2>Reģistrēties</h2>

        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_GET['error'];
                ?>
            </div>
        <?php } ?>

        <form action="store.php" method="post">
            <div class="form-group">
                <label>Email address</label>
                <input name="emails" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label>Repeat Password</label>
                <input name="password_repeat" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input name="agreement" type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Piekrītu noteikumiem</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require('layout/footer.php'); ?>
