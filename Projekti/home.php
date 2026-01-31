<?php
include "db.php";

// Merr përmbajtjen për Home nga tabela 'pages'
$slug = 'home';
$result = mysqli_query($conn, "SELECT * FROM pages WHERE slug='$slug'");
$page = mysqli_fetch_assoc($result);

// Nëse nuk gjendet faqja, vendos mesazh default
if (!$page) {
    $page = [
        'title' => 'Home',
        'content' => '<p>Përmbajtja nuk është gjetur.</p>'
    ];
}
?>
<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="nav-container">
        <nav class="main-nav">
            <a href="home.php" class="logo">Ngjitu</a>
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

<!-- Hero Section -->
<section class="hero">
    <div class="hero-overlay"></div>
    <h1 class="hero-title">Zbulo Aventurat e Mrekullueshme Malore</h1>
    <p class="hero-subtitle">Eksploro shtegun, natyrën dhe përjetimet që të presin</p>
</section>

<!-- Main Content -->
<main class="container">
    <?= $page['content'] ?>  <!-- Këtu shfaqim HTML direkt nga databaza -->
</main>

<!-- FAQ Section -->
<section class="faq-section" style="max-width:900px;margin:50px auto;padding:20px;background:#fff;border-radius:12px;box-shadow:0 4px 15px rgba(0,0,0,0.05);">
    <h2 style="text-align:center;color:#6a0dad;margin-bottom:30px;">Pyetje të Shpeshta</h2>

    <div class="faq-item" style="margin-bottom:15px;">
        <div class="faq-question" style="cursor:pointer;padding:15px;background:#f0e6ff;border-radius:8px;display:flex;justify-content:space-between;align-items:center;"
             onclick="toggleFAQ(this)">
            <span>Si mund të rezervoj një shteg?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer" style="display:none;padding:15px;background:#fff;border-left:3px solid #6a0dad;margin-top:5px;">
            Ju mund të rezervoni duke klikuar butonin 'Plotëso Formularin e Aplikimit' në fund të faqes Home ose direkt tek Na Kontaktoni.
        </div>
    </div>

    <div class="faq-item" style="margin-bottom:15px;">
        <div class="faq-question" style="cursor:pointer;padding:15px;background:#f0e6ff;border-radius:8px;display:flex;justify-content:space-between;align-items:center;"
             onclick="toggleFAQ(this)">
            <span>A mund të ndryshoj datën pas rezervimit?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer" style="display:none;padding:15px;background:#fff;border-left:3px solid #6a0dad;margin-top:5px;">
            Po, mund të ndryshoni datën duke kontaktuar ekipin tonë përmes formularit të kontaktit.
        </div>
    </div>

    <div class="faq-item" style="margin-bottom:15px;">
        <div class="faq-question" style="cursor:pointer;padding:15px;background:#f0e6ff;border-radius:8px;display:flex;justify-content:space-between;align-items:center;"
             onclick="toggleFAQ(this)">
            <span>A ofrohet udhërrëfyes profesional?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer" style="display:none;padding:15px;background:#fff;border-left:3px solid #6a0dad;margin-top:5px;">
            Po, të gjitha shtegët shoqërohen nga udhërrëfyes profesional për të siguruar një përvojë të sigurt dhe të këndshme.
        </div>
    </div>
</section>

<script>
function toggleFAQ(element){
    const answer = element.nextElementSibling;
    const icon = element.querySelector('.faq-icon');

    if(answer.style.display === 'block'){
        answer.style.display = 'none';
        icon.textContent = '+';
    } else {
        answer.style.display = 'block';
        icon.textContent = '-';
        // Scroll në fund të përgjigjes
        answer.scrollIntoView({behavior: 'smooth', block: 'end'});
    }
}
</script>


<footer>
    <div class="container">
        &copy; 2025 Ngjitu. Të gjitha të drejtat të rezervuara.
    </div>
</footer>

</body>
</html>
