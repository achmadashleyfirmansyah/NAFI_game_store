<?php
require_once 'config.php';

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$params = [
    'page_size' => 20,
    'page' => $page
];

$data = call_rawg('/games', $params);
$games = $data['results'] ?? [];

foreach ($games as $game): ?>
    <div class="game-card">
        <a href="detail.php?id=<?= urlencode($game['id']) ?>">
            <img src="<?= htmlspecialchars($game['background_image'] ?? 'https://via.placeholder.com/300x400/1c232f/00b0ff?text=No+Image') ?>">
            <h3><?= htmlspecialchars($game['name']) ?></h3>
        </a>
        <p class="meta rating-text">Rating: <?= htmlspecialchars($game['rating'] ?? 'N/A') ?>/5</p>
        <p class="meta release-text">Release: <?= htmlspecialchars($game['released'] ?? 'Unknown') ?></p>
    </div>
<?php endforeach; ?>
