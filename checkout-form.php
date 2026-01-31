<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout - Ngjitu</title>

    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f7f7f7;
        }

        header {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 50px;
        }

        .main-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #D6277D;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 17px;
        }

        .nav-links a:hover {
            color: #D6277D;
        }

        .nav-login-btn {
            background-color: #D6277D;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
        }

        .checkout-container {
            max-width: 900px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            color: #D6277D;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .full {
            grid-column: span 2;
        }

        label {
            font-weight: 600;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .btn-submit {
            grid-column: span 2;
            background-color: #D6277D;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #ff0c91;
        }

        footer {
            background-color: #e9ecef;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
    </style>
</head>
<body>

<header>
    <div class="nav-container">
        <nav class="main-nav">
            <a href="home.php" class="logo">Ngjitu</a>
            <div class="nav-links">
                <a href="home.php">Ballina</a>
                <a href="AboutUs.html">Rreth Nesh</a>
                <a href="Aventura.html">Aventura</a>
                <a href="news.php">Lajme</a>
                <a href="checkout-form.php">Na Kontaktoni</a>
                <a href="LogIn.html" class="nav-login-btn">Hyrja</a>
            </div>
        </nav>
    </div>
</header>

<div class="checkout-container">
    <h2>Finalizo Rezervimin</h2>

    <form id="checkoutForm">
    <div>
        <label>Emri</label>
        <input type="text" name="emri" required>
    </div>
    <div>
        <label>Mbiemri</label>
        <input type="text" name="mbiemri" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Numri i Telefonit</label>
        <input type="text" name="telefoni" required>
    </div>
    <div class="full">
        <label>Adresa</label>
        <input type="text" name="adresa" required>
    </div>
    <div>
        <label>Zgjidhni Datën</label>
        <input type="date" name="data" required>
    </div>
    <div>
        <label>Numri i Personave</label>
        <select name="persona" required>
            <option value="">Zgjidh...</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4+">4+</option>
        </select>
    </div>
    <div class="full">
        <label>Shënime Shtesë</label>
        <textarea name="shenime"></textarea>
    </div>

    <button type="submit" class="btn-submit">Konfirmo Rezervimin</button>
</form>

</div>

<footer>
    © 2025 Ngjitu - Të gjitha të drejtat e rezervuara.
</footer>

<script>
document.getElementById("checkoutForm").addEventListener("submit", function(e){
    e.preventDefault(); // ndalon reload të formës

    // marrim të dhënat e formës
    let formData = new FormData(this);

    // AJAX
    fetch('save_reservation.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // alert për sukses
        alert("Rezervimi u krye me sukses!");
        // ridrejtim
        window.location.href = "home.html";
    })
    .catch(error => {
        alert("Ka ndodhur një gabim: " + error);
    });
});
</script>


</body>
</html>
