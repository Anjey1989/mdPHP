<?php
    require_once("head.php");
    require_once("layout/header.php");


    if ($user === null) {
        session_destroy();
        show_error('Datubāzē Tevis nav');
    }
    var_dump($_GET);
    var_dump($_FILES);
    var_dump($_POST);
    if (isset($_GET['update_profile'], $_FILES['profile_image'], $_POST['user_name'])) {
        echo "test";
        $files_info = $_FILES['profile_image'];
        $tmp_name = $files_info['tmp_name'];

        $filename = microtime();
        $filename = str_replace(' ', '_', $filename);
        $filename = str_replace('.', '_', $filename);
        $filename = $filename . ".";

        $pathinfo = pathinfo($files_info['name']);

        $filename = $filename . $pathinfo['extension'];


        $target_file = "./uploads/" . $filename;

        $result = move_uploaded_file($tmp_name, $target_file);

        $user_name = $_POST['user_name'];

        $result = $user->update($user_name, $filename);

        if ($result) {
            if ($user->image !== null && file_exists("./uploads/" . $user->image)) {
                unlink("./uploads/" . $user->image);
            }

            $user->image = $filename;
            $user->name = $user_name;

        }
    }
?>

<div class="row">
    <div class="col-6 offset-3">
        <div class="text-center">
            <?php
                if ($user->image === null) {
                    echo '<img width="100" src="assets/images/default_user.png" class="img-thumbnail" />';
                } else {
                    echo '<img src="uploads/'.$user->image.'" class="img-fluid" />';
                }
            ?>
            <p><?php echo $user->name; ?></p>
            <p><?php echo $user->email; ?></p>
        </div>

        <hr />

        <form action="?update_profile" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="file" name="profile_image" class="custom-file-input" id="customFile">
            </div>
            <div class="form-group">
                <label>Your name</label>
                <input type="text" name="user_name" class="form-control" value="<?php echo $user->name; ?>" />
            </div>
            <div class="form-group">
                <input type="submit" value="Submit" />
            </div>
        </form>
    </div>
</div>

<?php
    require_once("layout/footer.php");
?>
