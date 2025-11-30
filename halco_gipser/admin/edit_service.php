<?php
session_start();
require_once "../config/db.php";
if(empty($_SESSION['admin_id'])) header("Location: login.php");

$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM services WHERE id=?");
$stmt->execute([$id]);
$service = $stmt->fetch();
if(!$service) exit("Service not found");

$error = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $service['image'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
    }

    $stmt = $pdo->prepare("UPDATE services SET title=?, description=?, image=? WHERE id=?");
    $stmt->execute([$title, $description, $image, $id]);
    header("Location: manage_services.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<h1>Edit Service</h1>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" value="<?= htmlspecialchars($service['title']) ?>" required><br>
    <textarea name="description"><?= htmlspecialchars($service['description']) ?></textarea><br>
    <?php if($service['image']): ?>
        <img src="../assets/images/<?= $service['image'] ?>" width="150" alt=""><br>
    <?php endif; ?>
    <input type="file" name="image"><br>
    <button type="submit">Update Service</button>
</form>
<?php include '../includes/footer.php'; ?>
