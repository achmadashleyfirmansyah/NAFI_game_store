<?php
define('RAWG_API_KEY', '54b1c491769f465ab03b5da62288c4d9');
define('RAWG_BASE_URL', 'https://api.rawg.io/api');

// Endpoint Trending → menggunakan game yang paling banyak ditambahkan (popular sekarang)
$endpoint = RAWG_BASE_URL . "/games?key=" . RAWG_API_KEY . "&ordering=-added&page_size=12";

$response = file_get_contents($endpoint);
$data = json_decode($response, true);

$games = $data['results'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trending Games - NAFI Game Store</title>
    <style>
        body {
            background-color: #0d1117;
            font-family: Arial, sans-serif;
            color: white;
            padding: 20px;
        }
                .navbar {
            background: #1c232f;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: 700;
            font-size: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .game-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .game-card {
            background-color: #161b22;
            padding: 15px;
            border-radius: 10px;
            transition: 0.3s;
        }
        .game-card:hover {
            transform: scale(1.05);
            background-color: #1f2937;
        }
        .game-card img {
            width: 100%;
            border-radius: 8px;
            height: 250px;
            object-fit: cover;
        }
        .title {
            font-size: 18px;
            margin-top: 10px;
            font-weight: bold;
        }
        .rating, .released {
            font-size: 14px;
            color: #9ba3af;
            margin-top: 5px;
        }
        .back-btn {
            display: inline-block;
            margin-top: 25px;
            background: #00b0ff;
            padding: 10px 15px;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }
        .back-btn:hover {
            background: #0091ea;
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">NAFI Game Store</a>
</div>
        <h1>Trending Games</h1>
    <div class="game-container">
        <?php if (count($games) > 0): ?>
            <?php foreach ($games as $game): ?>
                <div class="game-card">
                    <img src="<?= $game['background_image'] ?>" alt="<?= htmlspecialchars($game['name']) ?>">

                    <div class="title"><?= htmlspecialchars($game['name']) ?></div>

                    <div class="rating">⭐ Rating: <?= $game['rating'] ?>/5</div>

                    <div class="released">📅 Release: <?= $game['released'] ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center;">Gagal memuat data trending dari API.</p>
        <?php endif; ?>
    </div>
    <a href="index.php" class="back-btn">Back to Home</a>
</body>
</html>
