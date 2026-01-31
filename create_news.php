<?php include "db.php"; ?>

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

<?php
if(isset($_POST['save'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn,"INSERT INTO news(title,content) VALUES('$title','$content')");
    echo "Lajmi u shtua ✔";
}
?>

</body>
</html>