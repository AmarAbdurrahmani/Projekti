<?php
include "db.php";
$id = $_GET['id'];

$news = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT * FROM news WHERE id=$id")
);

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,
    "UPDATE news SET title='$title', content='$content' WHERE id=$id");

    header("Location: read_news.php");
}
?>

<form method="POST">
    <input type="text" name="title" value="<?= $news['title'] ?>"><br><br>
    <textarea name="content"><?= $news['content'] ?></textarea><br><br>
    <button name="update">Update</button>
</form>