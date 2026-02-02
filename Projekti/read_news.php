<?php
include "db.php";
require_once "News1.php";

$news = new News($conn);

$result = $news->getAll();
?>

<h2>Lajmet</h2>

<?php while($row = $result->fetch_assoc()): ?>
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

    <a href="edit_news.php?id=<?= $row['id'] ?>">Edit</a> |
    <a href="delete_news.php?id=<?= $row['id'] ?>" onclick="return confirm('A je i sigurt?')">Delete</a>

    <hr>
<?php endwhile; ?>
