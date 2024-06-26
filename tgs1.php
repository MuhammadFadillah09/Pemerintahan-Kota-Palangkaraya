<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemerintahan Kota Palangkaraya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #0f3057;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            background-color: #f4f4f4;
            padding: 10px 20px;
            text-align: center;
        }

        nav a {
            text-decoration: none;
            color: #333;
            margin: 0 10px;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #0f3057;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }
        .slide {
            display: none;
        }
        img {
            width: 100%;
            height: auto;
        }
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
            user-select: none;
        }

        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Gaya untuk PopUp Box */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #000000;
            z-index: 9999;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            max-width: 80%;
            text-align: center;
        }

        .popup-content {
            text-align: center;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <center>
    <header>
        <img src="asep1.png" alt="Logo Kota Palangkaraya" style="width: 100px; height: auto;">
        <h1>Pemerintahan Kota Palangkaraya</h1>
    </header>
    <nav>
        <a href="t.php">Beranda</a>
        <a href="profil.php">Profil Kota</a>
        <a href="layanan.php">Layanan Publik</a>
        <a href="berita.php">Berita</a>
        <a href="kontak.php">Kontak</a>
        <a href="login.php">Login</a>
    </nav>
    <main>
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="asep3.png" alt="Gambar 1">
            </div>
            <div class="slide fade">
                <img src="asep4.png" alt="Gambar 2">
            </div>
            <div class="slide fade">
                <img src="asep5.PNG" alt="Gambar 3">  
                
            </div>
            <!-- Tombol navigasi untuk carousel -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <?php
        $visitCount = 1;
        if(isset($_COOKIE['visitCount'])) {
            $visitCount = $_COOKIE['visitCount'] + 1;
        }
        setcookie('visitCount', $visitCount, time() + (86400 * 30), "/"); // 86400 = 1 day

        if ($visitCount > 1) {
            echo "<h3>Selamat Datang Kembali! Ini adalah kunjungan Anda yang ke-$visitCount.</h3>";
        } else {
            echo "<h3>Selamat Datang di Situs Resmi Pemerintahan Kota Palangkaraya!</h3>";
        }
        ?>

        <p>Situs ini merupakan portal resmi Pemerintahan Kota Palangkaraya yang menyediakan informasi tentang berbagai layanan publik, kebijakan pemerintah, berita terbaru, dan banyak lagi.</p>
        <p>Silakan jelajahi situs web kami untuk mendapatkan informasi lebih lanjut. Kami berkomitmen untuk memberikan pelayanan terbaik kepada warga Kota Palangkaraya.</p>
        <br><br>
    </main>
    <footer>
        <p>&copy; 2024 Pemerintahan Kota Palangkaraya</p>
        
    </footer>
    <script>
        var slideIndex = 0;
        var slides = document.getElementsByClassName("slide");
        var timer;
        showSlides();

        function showSlides() {
            var i;
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            slides[slideIndex-1].style.display = "block";  
            timer = setTimeout(showSlides, 3000); 
        }
        function plusSlides(n) {
            clearTimeout(timer); // Hentikan loop interval
            showSlides(slideIndex += n);
        }

        // Fungsi untuk menutup PopUp Box
        function closePopup() {
            document.getElementById("popup").style.display = "none";
        }

        // Tampilkan PopUp Box setelah 3 detik (contoh)
        setTimeout(function() {
            document.getElementById("popup").style.display = "block";
        }, 1000);
    </script>
    <!-- PopUp Box -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closePopup()">&times;</span>
            <h3>Pesan Penting</h3>
            <p>Ini adalah WebSite resmi Kota Palangkaraya.</p>
        </div>
    </div>
    </center>
</body>
</html>
