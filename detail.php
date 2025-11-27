<?php
require_once 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("Invalid game ID.");
}

// Ambil detail game dari API RAWG
$game = call_rawg('/games/' . $id);

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Game - <?= htmlspecialchars($game['name'] ?? '') ?></title>

    <style>
        body {
            font-family: 'Exo 2', sans-serif;
            background: #10141a;
            color: white;
            margin: 0;
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
        .container {
            width: 80%;
            margin: auto;
        }
        .game-header {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }
        .game-header img {
            width: 320px;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #2a3441;
        }
        .info-box h1 {
            color: #00b0ff;
            margin-bottom: 10px;
        }
        .meta {
            margin: 6px 0;
            opacity: .8;
        }
        .rating-text { color: #00e676; font-weight: 600; }
        .release-text { color: #90caf9; font-weight: 600; }

        .description {
            margin-top: 20px;
            background: #1c232f;
            padding: 15px;
            border-radius: 10px;
            line-height: 1.6;
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
<!-- NAVBAR -->
<div class="navbar">
    <a href="index.php">NAFI Game Store</a>
</div>
<div class="container">
    <div class="game-header">
        <img src="<?= htmlspecialchars($game['background_image'] ?? '') ?>" 
             alt="<?= htmlspecialchars($game['name']) ?>">

        <div class="info-box">
            <h1><?= htmlspecialchars($game['name']) ?></h1>

            <p class="meta rating-text">⭐ Rating: <?= $game['rating'] ?>/5</p>
            <p class="meta release-text">📅 Release: <?= $game['released'] ?></p>

            <p class="meta">🎮 Genre: 
                <?= implode(', ', array_column($game['genres'], 'name')) ?>
            </p>
            <?php
            $platformNames = [];
            if (!empty($game['platforms'])) {
                foreach ($game['platforms'] as $p) {
                    if (isset($p['platform']['name'])) {
                        $platformNames[] = $p['platform']['name'];
                    }}}?>
            <p class="meta">🖥 Platform: <?= implode(', ', $platformNames) ?></p>
        </div>
    </div>
    <div class="description">
        <?= $game['description'] ?>
    </div>
    <a href="index.php" class="back-btn">Back to Home</a>
</div>
</body>
</html>
