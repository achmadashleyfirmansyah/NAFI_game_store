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
            font-family: 'Exo 2', sans-serif;
            background: #10141a;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #1c232f !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: 600;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #00b0ff !important;
        }
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.3);
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.8%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        .container-main {
            padding: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #00b0ff;
            font-weight: 700;
        }
        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .search-form input, .search-form select, .search-form button {
            padding: 10px 15px;
            border-radius: 6px;
            border: none;
        }
        .search-form input {
            min-width: 250px;
        }
        .search-form button {
            background-color: #00b0ff;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-form button:hover {
            background-color: #0091ea;
        }
        .games {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .game-card {
            background: #1c232f;
            padding: 15px;
            border-radius: 10px;
            transition: transform 0.3s, background-color 0.3s;
            border: 1px solid #2a3441;
        }
        .game-card:hover {
            transform: translateY(-5px);
            background-color: #22303d;
            box-shadow: 0 5px 15px rgba(0, 176, 255, 0.2);
        }
        .game-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 10px;
        }
        .game-card h3 {
            font-size: 16px;
            margin-bottom: 8px;
            color: #fff;
            font-weight: 600;
        }
        .game-card a {
            color: inherit;
            text-decoration: none;
        }
        .game-card a:hover h3 {
            color: #00b0ff;
        }
        .meta {
            font-size: 14px;
            opacity: .8;
            margin-bottom: 5px;
        }
        .dropdown-menu {
            background: #1c232f;
            border: 1px solid #2a3441;
        }
        .dropdown-item {
            color: #fff;
        }
        .dropdown-item:hover {
            background: #00b0ff;
            color: #fff;
        }
        .form-control {
            background: #2a3441;
            border: 1px solid #3a4451;
            color: #fff;
        }
        .form-control:focus {
            background: #2a3441;
            border-color: #00b0ff;
            color: #fff;
            box-shadow: 0 0 0 0.2rem rgba(0, 176, 255, 0.25);
        }
        .btn-outline-success {
            color: #00b0ff;
            border-color: #00b0ff;
        }
        .btn-outline-success:hover {
            background-color: #00b0ff;
            border-color: #00b0ff;
        }
        .rating-text {
            color: #e9eeecff;   
            font-weight: 600;
        }

        .release-text {
            color: #e8edf1ff;   
            }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">NAFI Game Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="trending.php">Trending</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?genre=action">Action</a></li>
                        <li><a class="dropdown-item" href="?genre=adventure">Adventure</a></li>
                        <li><a class="dropdown-item" href="?genre=rpg">RPG</a></li>
                        <li><a class="dropdown-item" href="?genre=sports">Sports</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">All Games</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
            </ul>
            <form class="d-flex" method="GET" role="search">
                <input class="form-control me-2" type="search" placeholder="Search games..." name="search" value="<?= htmlspecialchars($search) ?>" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!-- Main Content -->
<div class="container container-main">
    <!-- Games Grid -->
    <div class="games">
        <?php if (empty($games)): ?>
            <div class="col-12 text-center">
                <p class="text-muted">No games found. Try different search criteria.</p>
            </div>
        <?php else: ?>
            <?php foreach ($games as $game): ?>
                <div class="game-card">
                    <a href="detail.php?id=<?= urlencode($game['id']) ?>">
                        <img src="<?= htmlspecialchars($game['background_image'] ?? 'https://via.placeholder.com/300x400/1c232f/00b0ff?text=No+Image') ?>" alt="<?= htmlspecialchars($game['name']) ?>">
                        <h3><?= htmlspecialchars($game['name']) ?></h3>
                    </a>
                <p class="meta rating-text">Rating: <?= htmlspecialchars($game['rating'] ?? 'N/A') ?>/5</p>
                <p class="meta release-text">Release: <?= htmlspecialchars($game['released'] ?? 'Unknown') ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
