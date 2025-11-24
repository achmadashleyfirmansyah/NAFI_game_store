<?php
// Halaman About bersifat statis, jadi tidak ada panggilan API atau konfigurasi yang diperlukan.
// require_once 'config.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - NAFI Game Store</title>
    
    <!-- Menggunakan font Google Fonts Exo 2 -->
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* ======================== GLOBAL STYLES ======================== */
        body {
            font-family: 'Exo 2', sans-serif;
            background: #10141a; /* Background utama gelap */
            color: #fff;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background: #1c232f !important;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 600;
            transition: color 0.3s;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #00b0ff !important;
        }
        .nav-link.active {
            color: #00b0ff !important; /* Menandai menu aktif */
            border-bottom: 2px solid #00b0ff;
            padding-bottom: 5px;
        }

        /* ======================== MAIN CONTENT & HEADER ======================== */
        .container-main {
            flex-grow: 1; /* Konten utama akan mengambil sisa ruang */
            padding: 40px 20px;
            margin-top: 20px;
            max-width: 1100px; 
        }
        h1 {
            text-align: center;
            margin-bottom: 50px;
            color: #00b0ff;
            font-weight: 700;
            text-transform: uppercase;
        }
        .section-separator {
            width: 100px;
            height: 4px;
            background-color: #00b0ff;
            margin: 0 auto 50px;
            border-radius: 2px;
        }

        /* ======================== ABOUT SECTION STYLES ======================== */
        .about-section {
            background: #1c232f;
            padding: 40px;
            border-radius: 12px;
            margin-bottom: 40px;
            border: 1px solid #2a3441;
            box-shadow: 0 0 20px rgba(0, 176, 255, 0.05);
        }
        .about-section h2 {
            color: #00b0ff;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
        }
        
        /* --- Misi Section --- */
        .mission p {
            font-size: 1.1em;
            line-height: 1.8;
            text-align: justify;
        }

        /* --- Team Section --- */
        .team-card {
            background: #2a3441;
            padding: 30px 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%; /* Agar semua kartu memiliki tinggi yang sama */
        }
        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 176, 255, 0.2);
            background: #334050;
        }
        .team-avatar {
            width: 90px;
            height: 90px;
            background-color: #00b0ff;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1em;
            color: #10141a;
            font-weight: bold;
            box-shadow: 0 0 0 5px #1c232f; /* Ring luar */
        }
        .team-card h4 {
            color: #fff;
            margin-bottom: 3px;
            font-size: 1.2em;
        }
        .team-card p {
            color: #aaa;
            font-size: 0.9em;
        }

        /* --- Contact Section --- */
        .contact ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .contact li {
            padding: 5px 0;
            border-bottom: 1px dashed #2a3441;
        }
        .contact li:last-child {
             border-bottom: none;
        }
        .text-info {
            color: #00b0ff !important;
            font-weight: 600;
        }

        /* ======================== FOOTER ======================== */
        footer {
            background: #1c232f;
            color: #aaa;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #2a3441;
            margin-top: auto; /* Memastikan footer berada di paling bawah */
        }
    </style>
</head>
<body>

<!-- Navbar (Diambil dari index.php) -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">NAFI Game Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trending</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <!-- Link Genre harus mengarah kembali ke index.php -->
                        <li><a class="dropdown-item" href="index.php?genre=action">Action</a></li>
                        <li><a class="dropdown-item" href="index.php?genre=adventure">Adventure</a></li>
                        <li><a class="dropdown-item" href="index.php?genre=rpg">RPG</a></li>
                        <li><a class="dropdown-item" href="index.php?genre=sports">Sports</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php">All Games</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="about.php">About</a>
                </li>
            </ul>
            <!-- Form Pencarian di Navbar (tetap mengarah ke index.php) -->
            <form class="d-flex" method="GET" action="index.php" role="search">
                <input class="form-control me-2" type="search" placeholder="Search games..." name="search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- Main Content untuk Halaman About -->
<div class="container container-main">
    <h1>Kenali Kami Lebih Dekat</h1>
    <div class="section-separator"></div>

    <!-- 1. Misi Kami -->
    <section class="about-section mission">
        <h2>Misi dan Visi</h2>
        <p>NAFI Game Store didirikan pada tahun 2023 dengan misi utama untuk menjadi *platform* distribusi game digital terdepan di Indonesia. Kami tidak hanya menyediakan akses mudah dan cepat ke koleksi game terbaik, tetapi juga berkomitmen membangun ekosistem yang mendukung kreativitas pengembang dan kenyamanan para gamer.</p>
        <p>Visi kami adalah menjadikan pengalaman membeli, mengunduh, dan memainkan game sesederhana dan senyaman mungkin. Kami menjamin keamanan transaksi, harga yang kompetitif, dan layanan pelanggan 24/7 yang responsif.</p>
    </section>

    <!-- 2. Tim Inti -->
    <section class="about-section">
        <h2>Tim Inti Kami</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
            
            <div class="col">
                <div class="team-card">
                    <div class="team-avatar">A</div>
                    <h4>Achmad Ashley F.</h4>
                    <p class="text-muted">2313030109 | CEO</p>
                </div>
            </div>
            
            <div class="col">
                <div class="team-card">
                    <div class="team-avatar">F</div>
                    <h4>Ferdyan Andi P.</h4>
                    <p class="text-muted">2313030042 | CTO</p>
                </div>
            </div>
            
            <div class="col">
                <div class="team-card">
                    <div class="team-avatar">M</div>
                    <h4>Muhammad Maulfin N.</h4>
                    <p class="text-muted">2313030032 | CS Lead</p>
                </div>
            </div>
            
            <div class="col">
                <div class="team-card">
                    <div class="team-avatar">B</div>
                    <h4>Bramantio Indrajaya</h4>
                    <p class="text-muted">2313030113 | Marketing</p>
                </div>
            </div>
            
        </div>
    </section>

    <!-- 3. Hubungi Kami -->
    <section class="about-section contact">
        <h2>Kontak dan Dukungan</h2>
        <p class="mb-4">Kami menghargai setiap masukan dan pertanyaan dari komunitas. Jangan ragu untuk menghubungi kami melalui kanal-kanal berikut:</p>
        <ul>
            <li>Dukungan Email: <span class="text-info">support@nafigames.com</span> (Respons dalam 1x24 jam)</li>
            <li>Layanan Pelanggan (Telepon): <span class="text-info">+62 812-345-678</span> (Tersedia jam kerja)</li>
            <li>Kantor Pusat: Alamat: Surabaya, Indonesia.</li>
        </ul>
    </section>
</div>

<!-- Footer -->
<footer>
    <p class="m-0">&copy; 2024 NAFI Game Store. Hak Cipta Dilindungi.</p>
    <p class="m-0" style="font-size: 0.8em;">Platform Game Digital Terbaik Anda.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>