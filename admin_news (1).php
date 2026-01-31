<?php
include "db.php";

// -------------------- LAJMET --------------------

// Shto lajmin
if(isset($_POST['add_news'])){
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn, "INSERT INTO news(title, content) VALUES('$title','$content')");
    header("Location: admin_news.php");
}

// Update lajmin
if(isset($_POST['update_news'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    mysqli_query($conn, "UPDATE news SET title='$title', content='$content' WHERE id=$id");
    header("Location: admin_news.php");
}

// Delete lajmin
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM news WHERE id=$id");
    header("Location: admin_news.php");
}

// Nese po edit, merr te dhenat e lajmit
$edit_title = "";
$edit_content = "";
$edit_id = 0;
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM news WHERE id=$edit_id"));
    $edit_title = $row['title'];
    $edit_content = $row['content'];
}

// -------------------- RESERVIMET --------------------
$reservimet = mysqli_query($conn, "SELECT * FROM reservations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Lajme & Rezervime</title>
    <style>
        body { font-family: system-ui, Arial; margin: 0; padding: 0; background: #f4f4f4; }
        header { background: #333; color: white; padding: 15px 30px; }
        .container { padding: 20px; max-width: 1000px; margin: auto; }
        h2, h3 { margin-top: 0; }
        form { background: white; padding: 20px; border-radius: 10px; margin-bottom: 30px; }
        input, textarea { width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 6px; border: 1px solid #ccc; }
        button { padding: 10px 15px; border: none; border-radius: 6px; background: #6a0dad; color: white; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; margin-bottom: 40px; }
        th, td { padding: 12px; border-bottom: 1px solid #ccc; text-align: left; vertical-align: top; }
        a { color: #6a0dad; text-decoration: none; }
        a.delete { color: crimson; }
        .logout { margin-top: 20px; padding: 10px 15px; border: none; border-radius: 6px; background: #555; color: white; cursor: pointer; }
        .logout:hover { background: #333; }
    </style>
</head>
<body>

<header>
    <h2>Admin Dashboard - Menaxho Lajmet & Rezervimet</h2>
</header>

<div class="container">

    <!-- Form Shto / Edit Lajmin -->
    <form method="POST">
        <h3><?php echo $edit_id ? "Edito Lajmin" : "Shto Lajm të Ri"; ?></h3>
        <input type="hidden" name="id" value="<?= $edit_id ?>">
        <input type="text" name="title" placeholder="Titulli" value="<?= htmlspecialchars($edit_title) ?>" required>
        <textarea name="content" placeholder="Përmbajtja" rows="5" required><?= htmlspecialchars($edit_content) ?></textarea>
        <?php if($edit_id): ?>
            <button type="submit" name="update_news">Update Lajmin</button>
            <a href="admin_news.php" style="margin-left: 10px; color: #333;">Anulo</a>
        <?php else: ?>
            <button type="submit" name="add_news">Shto Lajmin</button>
        <?php endif; ?>
    </form>

    <!-- Lista e Lajmeve -->
    <h3>Të Gjitha Lajmet</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulli</th>
                <th>Përmbajtja</th>
                <th>Data</th>
                <th>Veprime</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM news ORDER BY created_at DESC");
            while($row = mysqli_fetch_assoc($result)):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['title']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['content'])) ?></td>
                <td><?= date("d M Y", strtotime($row['created_at'])) ?></td>
                <td>
                    <a href="admin_news.php?edit=<?= $row['id'] ?>">Edit</a> | 
                    <a href="admin_news.php?delete=<?= $row['id'] ?>" class="delete" onclick="return confirm('A je i sigurt?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Lista e Rezervimeve -->
    <h3>Të Gjitha Rezervimet</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Emri</th>
                <th>Mbiemri</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Adresa</th>
                <th>Data</th>
                <th>Persona</th>
                <th>Shënime</th>
                <th>Regjistruar më</th>
            </tr>
        </thead>
        <tbody>
            <?php while($res = mysqli_fetch_assoc($reservimet)): ?>
            <tr>
                <td><?= $res['id'] ?></td>
                <td><?= htmlspecialchars($res['emri']) ?></td>
                <td><?= htmlspecialchars($res['mbiemri']) ?></td>
                <td><?= htmlspecialchars($res['email']) ?></td>
                <td><?= htmlspecialchars($res['telefoni']) ?></td>
                <td><?= htmlspecialchars($res['adresa']) ?></td>
                <td><?= htmlspecialchars($res['data']) ?></td>
                <td><?= htmlspecialchars($res['persona']) ?></td>
                <td><?= nl2br(htmlspecialchars($res['shenime'])) ?></td>
                <td><?= date("d M Y H:i", strtotime($res['created_at'])) ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</div>

<button class="logout" onclick="logout()">Dil nga Admin</button>

<script>
function logout() {
    window.location.href = "LogIn.html";
}
</script>

</body>
</html>
