<?php
require_once 'config.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$genre  = isset($_GET['genre']) ? $_GET['genre'] : '';
$sort   = isset($_GET['sort']) ? $_GET['sort'] : '';

// Parameter default
$params = [
    'page_size' => 20,
];

// pencarian
if (!empty($search)) {
    $params['search'] = $search;
}

// genre
if (!empty($genre)) {
    $params['genres'] = $genre;
}

// sortir
if (!empty($sort)) {
    $params['ordering'] = $sort;
}

// Call API 
$data = call_rawg('/games', $params);
$games = $data['results'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>NAFI Game Store</title>

    <style>
        body {
            font-family: Exo 2, sans-serif;
            background: #10141a;
            color: #fff;
            margin: 0; padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 15px;
        }
        form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            justify-content: center;
        }
        input, select, button {
            padding: 10px;
            border-radius: 6px;
            border: none;
        }
        button {
            background-color: #00b0ff;
            cursor: pointer;
        }
        .games {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }
        .game-card {
            background: #1c232f;
            padding: 10px;
            border-radius: 8px;
            transition: .2s;
        }
        .game-card:hover {
            transform: scale(1.04);
            background-color: #22303d;
        }
        .game-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 6px;
        }
        a {
            color: #00b0ff;
            text-decoration: none;
        }
        .meta {
            font-size: 14px;
            opacity: .8;
        }
    </style>
</head>
<body>

<h1>NAFI Game Store</h1>

<form method="GET">

    <!-- Search -->
    <input type="text" placeholder="Cari game..." name="search" value="<?= htmlspecialchars($search) ?>">

    <!-- Filter Genre -->
    <select name="genre">
        <option value=""> Genre </option>
        <option value="action" <?= $genre=='action' ? 'selected' : '' ?>>Action</option>
        <option value="adventure" <?= $genre=='adventure' ? 'selected' : '' ?>>Adventure</option>
        <option value="rpg" <?= $genre=='rpg' ? 'selected' : '' ?>>RPG</option>
        <option value="sports" <?= $genre=='sports' ? 'selected' : '' ?>>Sports</option>
    </select>

    <!-- Sorting -->
    <select name="sort">
        <option value=""> Sort </option>
        <option value="-rating" <?= $sort=='-rating' ? 'selected' : '' ?>>Rating Tertinggi</option>
        <option value="-released" <?= $sort=='-released' ? 'selected' : '' ?>>Rilis Terbaru</option>
        <option value="name" <?= $sort=='name' ? 'selected' : '' ?>>Nama A-Z</option>
    </select>

    <button type="submit">Go</button>
</form>

 <!-- List Game -->

<div class="games">
    <?php foreach ($games as $game): ?>
        <div class="game-card">
            <a href="detail.php?id=<?= urlencode($game['id']) ?>">
                <img src="<?= htmlspecialchars($game['background_image']) ?>" alt="">
                <h3><?= htmlspecialchars($game['name']) ?></h3>
            </a>
            <p class="meta">Rating: <?= htmlspecialchars($game['rating']) ?></p>
            <p class="meta">Release: <?= htmlspecialchars($game['released']) ?></p>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
