<?php
include "db.php";
require_once "News1.php";

$newsObj = new News($conn);

$result = $newsObj->getAll();
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
            color: #D6277D;
            font-weight: bold;
            text-decoration: none;
        }
        .hamburger {
            display: none;
            font-size: 28px;
            cursor: pointer;
            color: #D6277D;
        }

        @media (max-width: 768px) {
            .news-section {
                flex-direction: column;
            }
            .news-image, .news-content {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .nav-container { padding: 0 20px; box-sizing: border-box; }
            .hamburger { display: block; }

            .nav-links {
                display: none;
                flex-direction: column;
                gap: 10px;
                position: absolute;
                top: 80px;
                right: 0;
                left: auto;
                width: auto;
                max-width: 100vw;
                box-sizing: border-box;
                background: #fff;
                box-shadow: 0 4px 8px rgba(0,0,0,0.08);
                border-radius: 0 0 8px 8px;
                z-index: 1000;
                padding: 8px 0;
                overflow-x: hidden;
            }
            .nav-links.show { display: flex; }
            .nav-links a { padding: 12px 16px; border-bottom: 1px solid #eee; width: 100%; box-sizing: border-box; }

            .news-section {
                flex-direction: column;
            }
            .news-image, .news-content {
                max-width: 100%;
            }
            .news-image img { width: 100%; height: auto; display: block; }

            html, body { overflow-x: hidden; }
        }
   
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <nav class="main-nav">
            <a href="home.php" class="logo">Ngjitu</a>
            <a href="javascript:void(0);" class="hamburger" onclick="toggleMenu()">&#9776;</a>
            <div class="nav-links">
                <a href="home.php" class="active">Ballina</a>
                <a href="AboutUs.html">Rreth Nesh</a>
                <a href="Aventura.html">Aventura</a>
                <a href="news.php">Lajme</a>
                <a href="checkout-form.php">Na Kontaktoni</a>
                <a href="LogIn.html" class="nav-login-btn">Hyrja</a>
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
while ($row = $result->fetch_assoc()) {

    $image = "images/image2.webp";
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
            <a href="AboutUs.html" class="read-more">Lexo më shumë →</a>
        </div>
    </div>
    ';
}
?>

</main>

<footer>
    <div class="container">
        &copy; 2026 Ngjitu. Të gjitha të drejtat të rezervuara.
    </div>
</footer>
<script>
function toggleMenu() {
    const nav = document.querySelector('.nav-links');
    nav.classList.toggle('show');
}
</script>
</body>
</html>
