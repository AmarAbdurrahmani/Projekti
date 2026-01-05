<?php
include "db.php"; // lidhja me databazën
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lajme & Artikuj - Ngjitu</title>
    <link rel="stylesheet" href="css/style.css">

    <style>
        .news-section {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }

        .news-image {
            flex: 2;
            max-width: 40%;
        }

        .news-image img {
            width: 100%;
            border-radius: 8px;
        }

        .news-content {
            flex: 3;
        }

        .news-content h2 {
            margin-top: 0;
        }

        .news-meta {
            font-size: 14px;
            color: #888;
            margin-bottom: 10px;
        }

        .read-more {
            display: inline-block;
            margin-top: 15px;
            color: #6a0dad;
            font-weight: bold;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .news-section {
                flex-direction: column;
            }
            .news-image, .news-content {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <nav class="main-nav">
            <a href="home.html" class="logo">Ngjitu</a>
            <div class="nav-links">
                <a href="home.html">Home</a>
                <a href="AboutUs.html">Rreth Nesh</a>
                <a href="Aventura.html">Aventura</a>
                <a href="news.php" class="active">Lajme</a>
                <a href="LogIn.html" class="nav-login-btn">Hyrja / Register</a>
            </div>
        </nav>
    </div>
</header>

<section class="hero">
    <div class="hero-overlay"></div>
    <h1 class="hero-title">Lajme & Artikuj</h1>
    <p class="hero-subtitle">Të rejat më të fundit nga bota e aventurave malore</p>
</section>

<main class="container">

<?php
// Merr lajmet nga databaza
$result = mysqli_query($conn, "SELECT * FROM news ORDER BY created_at DESC");

// Loop për secilin lajm
while($row = mysqli_fetch_assoc($result)){

    // Imazh default për lajmet (mund të ndryshohet)
    $image = "images/image2.webp";

    // Data formatuar
    $date = date("d M Y", strtotime($row['created_at']));

    echo '
    <div class="news-section">
        <div class="news-image">
            <img src="'.$image.'" alt="'.htmlspecialchars($row['title']).'">
        </div>
        <div class="news-content">
            <div class="news-meta">'.$date.'</div>
            <h2>'.htmlspecialchars($row['title']).'</h2>
            <p>'.nl2br(htmlspecialchars($row['content'])).'</p>
            <a href="#" class="read-more">Lexo më shumë →</a>
        </div>
    </div>
    ';
}
?>

</main>

<footer>
    <div class="container">
        &copy; 2025 Ngjitu. Të gjitha të drejtat të rezervuara.
    </div>
</footer>

</body>
</html>