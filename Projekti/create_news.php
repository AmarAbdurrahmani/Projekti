<?php 
include "db.php";
require_once "News1.php";

$news = new News($conn);

if(isset($_POST['save'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    if($news->insert($title, $content)){
        echo "Lajmi u shtua me sukses!";
    } else {
        echo "Gabim gjatë shtimit";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Shto News</title>
</head>
<body>

<h2>Shto Lajm</h2>

<form method="POST">
    <input type="text" name="title" placeholder="Titulli" required><br><br>
    <textarea name="content" placeholder="Përmbajtja" required></textarea><br><br>
    <button name="save">Shto</button>
</form>

</body>
</html>
