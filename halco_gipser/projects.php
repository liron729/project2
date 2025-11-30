<?php
require 'config/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();
?>

<div class="container">
    <h1>Our Projects</h1>
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
