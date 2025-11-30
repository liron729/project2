<?php
require 'config/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

// Fetch latest 3 projects for homepage
$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 3")->fetchAll();
?>

<div class="container">
    <h1>Welcome to Halco Gipser GmbH</h1>
    <p>Professional plastering and construction services you can trust.</p>

    <h2>Our Projects</h2>
    <div class="card-grid">
        <?php foreach($projects as $p): ?>
            <div class="card">
                <?php if($p['image']): ?>
                    <img src="assets/images/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['title']) ?>">
                <?php endif; ?>
                <h3><?= htmlspecialchars($p['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($p['description'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
