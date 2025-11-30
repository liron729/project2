<?php
require 'config/db.php';
include 'includes/header.php';
include 'includes/navbar.php';

$services = $pdo->query("SELECT * FROM services ORDER BY created_at DESC")->fetchAll();
?>

<div class="container">
    <h1>Our Services</h1>
    <div class="card-grid">
        <?php foreach($services as $s): ?>
            <div class="card">
                <?php if($s['image']): ?>
                    <img src="assets/images/<?= htmlspecialchars($s['image']) ?>" alt="<?= htmlspecialchars($s['title']) ?>">
                <?php endif; ?>
                <h3><?= htmlspecialchars($s['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars($s['description'])) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
