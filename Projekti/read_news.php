<?php include "db.php"; ?>

<h2>Lajmet</h2>

<?php
$result = mysqli_query($conn,"SELECT * FROM news");

while($row = mysqli_fetch_assoc($result)){
?>
<h3><?= $row['title'] ?></h3>
<p><?= $row['content'] ?></p>

<a href="edit_news.php?id=<?= $row['id'] ?>">Edit</a> |
<a href="delete_news.php?id=<?= $row['id'] ?>" onclick="return confirm('A je i sigurt?')">Delete</a>

<hr>
<?php } ?>