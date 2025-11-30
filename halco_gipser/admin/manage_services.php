<?php
session_start();
require_once "../config/db.php";
if(empty($_SESSION['admin_id'])) header("Location: login.php");

// Delete service
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM services WHERE id=?")->execute([$id]);
    header("Location: manage_services.php");
    exit;
}

// Fetch all services
$services = $pdo->query("SELECT * FROM services ORDER BY created_at DESC")->fetchAll();
?>

<?php include '../includes/header.php'; ?>
<h1>Manage Services</h1>
<a href="add_service.php">Add New Service</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th><th>Title</th><th>Actions</th>
    </tr>
    <?php foreach($services as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= htmlspecialchars($s['title']) ?></td>
        <td>
            <a href="edit_service.php?id=<?= $s['id'] ?>">Edit</a> |
            <a href="?delete=<?= $s['id'] ?>" onclick="return confirm('Delete this service?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>
