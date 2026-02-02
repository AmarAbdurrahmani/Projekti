<?php
include "db.php";

$slug = 'home';
$result = mysqli_query($conn, "SELECT * FROM pages WHERE slug='$slug'");
$page = mysqli_fetch_assoc($result);

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
    <h1 class="hero-title">Zbulo Aventurat e Mrekullueshme Malore</h1>
    <p class="hero-subtitle">Eksploro shtegun, natyrën dhe përjetimet që të presin</p>
</section>

<!---Koleg ketu e shfaqim codin e htmls nga databaza-->
<main class="container">
    <?= $page['content'] ?>  
</main>


<section class="slider">
    <div class="slider-wrapper">
        <div class="slide active" style="background-image:url('images/rugova_canyon.png')">
            <div class="slide-content">
                <h2>Rugova Canyon</h2>
                <p>Një nga destinacionet më të bukura për hiking</p>
            </div>
        </div>

        <div class="slide" style="background-image:url('images/valbona.png')">
            <div class="slide-content">
                <h2>Valbona</h2>
                <p>Natyra e paprekur dhe shtigje magjike</p>
            </div>
        </div>

        <div class="slide" style="background-image:url('images/bjeshket.png')">
            <div class="slide-content">
                <h2>Bjeshkët e Nemuna</h2>
                <p>Aventura që nuk harrohet</p>
            </div>
        </div>
    </div>

    <button class="slider-btn prev" onclick="prevSlide()">‹</button>
    <button class="slider-btn next" onclick="nextSlide()">›</button>
</section>


<section class="faq-section">
    <h2>Pyetje të Shpeshta</h2>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleFAQ(this)">
            <span>Si mund të rezervoj një shteg?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer">
            Ju mund të rezervoni duke klikuar butonin "Plotëso Formularin e Aplikimit"
            ose direkt tek Na Kontaktoni.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleFAQ(this)">
            <span>A mund të ndryshoj datën pas rezervimit?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer">
            Po, mund të ndryshoni datën duke kontaktuar ekipin tonë.
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question" onclick="toggleFAQ(this)">
            <span>A ofrohet udhërrëfyes profesional?</span>
            <span class="faq-icon">+</span>
        </div>
        <div class="faq-answer">
            Po, të gjitha shtegët shoqërohen nga udhërrëfyes profesional.
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
        answer.scrollIntoView({behavior: 'smooth', block: 'end'});
    }
}
</script>


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
<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach(slide => slide.classList.remove('active'));
    slides[index].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

setInterval(nextSlide, 5000);
</script>


</body>
</html>
