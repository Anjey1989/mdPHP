<?php
require_once("head.php");
require_once("layout/header.php");


if ($user === null) {
    session_destroy();
    show_error('Datubāzē Tevis nav');
}
if (isset($_GET['insert_post'], $_FILES['article_image'], $_POST['article_title'], $_POST['article_content'])) {
    $files_info = $_FILES['article_image'];
    $tmp_name = $files_info['tmp_name'];

    $filename = microtime();
    $filename = str_replace(' ', '_', $filename);
    $filename = str_replace('.', '_', $filename);
    $filename = $filename . ".";

    $pathinfo = pathinfo($files_info['name']);

    $filename = $filename . $pathinfo['extension']; // jautajums

    $target_file = "./uploads/" . $filename;

    $result = move_uploaded_file($tmp_name, $target_file);

    $article_title = $_POST['article_title'];
    $article_content = $_POST['article_content'];

    $result = $user->add_article($article_title, $article_content, $target_file);

    if ($result) { //JAUTAJUMS
        if ($user->article_image !== null && file_exists("./uploads/" . $user->article_image)) {
            unlink("./uploads/" . $user->article_image);
        }

        $user->article_image = $filename;
    }
}
// var_dump($user);
?>

<div class="row">
    <div class="col-6 offset-3">
        <form action="?insert_post" method="post" enctype="multipart/form-data">
            <div class="custom-file">
                <label class="custom-file-label" for="customFile">Featured image</label>
                <input type="file" name="article_image" class="custom-file-input" id="customFile">
            </div>
            <div class="form-group">
                <label>Article title</label>
                <input type="text" name="article_title" class="form-control" />
            </div>
            <div class="form-group">
                <label>Article content</label>
                <textarea name="article_content" class="form-control"></textarea>
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