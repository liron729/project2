<?php
session_start();
require_once "../config/db.php";
if(empty($_SESSION['admin_id'])) header("Location: login.php");

// Delete project
if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM projects WHERE id=?")->execute([$id]);
    header("Location: manage_projects.php");
    exit;
}

// Fetch all projects
$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll();
?>

<?php include '../includes/header.php'; ?>
<h1>Manage Projects</h1>
<a href="add_project.php">Add New Project</a>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th><th>Title</th><th>Actions</th>
    </tr>
    <?php foreach($projects as $p): ?>
    <tr>
        <td><?= $p['id'] ?></td>
        <td><?= htmlspecialchars($p['title']) ?></td>
        <td>
            <a href="edit_project.php?id=<?= $p['id'] ?>">Edit</a> |
            <a href="?delete=<?= $p['id'] ?>" onclick="return confirm('Delete this project?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>
