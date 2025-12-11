<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once(__DIR__ . '/../config/config.php');
?>
<style>
/* nav {
    background-color: #333;
    padding: 10px 0;
}
nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
}
nav ul li {
    margin: 0 15px;
}
nav ul li a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
nav ul li a:hover {
    text-decoration: underline;
} */
    

</style>

<nav>
  <ul>
    <li><a href="<?php echo $basePath; ?>/index.php">Home</a></li>
    <!-- <li><a href="<?php echo $basePath; ?>/pages/product.php">Products</a></li> -->
    <li><a href="<?php echo $basePath; ?>/pages/about.php">About</a></li>

    <?php if (isset($_SESSION['user_id'])): ?>
        <li><a href="<?php echo $basePath; ?>/cart.php">Cart</a></li>
        <li><a href="<?php echo $basePath; ?>/pages/wishlist.php">Wishlist</a></li>
        
<?php if (!empty($_SESSION['is_admin'])): ?>
    <li><a href="<?php echo $basePath; ?>/admin/dashboard.php">Dashboard</a></li>
    <li><a href="<?php echo $basePath; ?>/admin/add_product.php">Add Product</a></li>
    <li><a href="<?php echo $basePath; ?>/admin/manage_products.php">Manage Products</a></li>
    <li><a href="<?php echo $basePath; ?>/admin/manage_orders.php">Manage Orders</a></li>
    <li><a href="<?php echo $basePath; ?>/admin/manage_users.php">Manage Users</a></li>
    <!-- <li><a href="<?php echo $basePath; ?>/admin/logs.php">Logs</a></li> -->
<?php endif; ?>



        <li><a href="<?php echo $basePath; ?>/logout.php">Logout (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
    <?php else: ?>
        <li><a href="<?php echo $basePath; ?>/login.php">Login</a></li>
        <li><a href="<?php echo $basePath; ?>/register.php">Register</a></li>
    <?php endif; ?>
  </ul>
</nav>
