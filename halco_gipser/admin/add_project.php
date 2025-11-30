<?php
session_start();
require_once "../config/db.php";
if(empty($_SESSION['admin_id'])) header("Location: login.php");

$error = "";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $image = time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
    }

    if($title) {
        $stmt = $pdo->prepare("INSERT INTO projects (title, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$title, $description, $image]);
        header("Location: manage_projects.php");
        exit;
    } else {
        $error = "Title is required.";
    }
}
?>

<?php include '../includes/header.php'; ?>
<h1>Add Project</h1>
<?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="file" name="image"><br>
    <button type="submit">Add Project</button>
</form>
<?php include '../includes/footer.php'; ?>
