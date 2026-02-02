<?php
include "db.php";
require_once "News1.php";

$newsObj = new News($conn);

$id = $_GET['id'] ?? 0; 

$news = $newsObj->getById($id);

if(!$news){
    die("Lajmi nuk u gjet!");
}

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($newsObj->update($id, $title, $content)){
        header("Location: read_news.php");
        exit;
    } else {
        echo "Gabim gjatë përditësimit";
    }
}
?>

<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($news['title']) ?>" required><br><br>
    <textarea name="content" required><?= htmlspecialchars($news['content']) ?></textarea><br><br>
    <button name="update">Update</button>
</form>
