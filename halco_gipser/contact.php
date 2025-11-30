<?php
include 'includes/header.php';
include 'includes/navbar.php';

$error = $success = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if($name && $email && $message){
        // Here you can store in DB or send email
        $success = "Thank you! Your message has been sent.";
    } else {
        $error = "All fields are required.";
    }
}
?>

<div class="container">
    <h1>Contact Us</h1>
    <?php if($error) echo "<p style='color:red;'>$error</p>"; ?>
    <?php if($success) echo "<p style='color:green;'>$success</p>"; ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Your Name" required><br>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <textarea name="message" placeholder="Message" required></textarea><br>
        <button type="submit">Send Message</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
