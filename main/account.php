<?php
session_start();
if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['Username'];

// Database connection
$conn = new mysqli("localhost", "root", "", "cuddlepaws");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Use a prepared statement for secure querying
$stmt = $conn->prepare("SELECT * FROM users WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $firstname = htmlspecialchars($user['FirstName']);
    $lastname = htmlspecialchars($user['LastName']);
    $email = htmlspecialchars($user['Email']);
    $phone_num = isset($user['Phone_num']) ? htmlspecialchars($user['Phone_num']) : 'N/A';
    $municipality = htmlspecialchars($user['Municipality']);
    $barangay = htmlspecialchars($user['Barangay']);
    $phase = isset($user['Phase']) ? htmlspecialchars($user['Phase']) : 'N/A';
} else {
    header("Location: error.php?message=User not found");
    exit();
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Details</title>
    <link rel="stylesheet" href="css/account.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="index.php#about-us">About</a></li>
                <?php if (isset($_SESSION['Username'])): ?>
                    <li><a href="account.php">Account</a></li>
                <?php else: ?>
                    <li><a href="login.php">Log In/Sign Up</a></li>
                <?php endif; ?>
            </ul>
            <div class="logo">
                <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" alt="Hero Image">
                <a href="index.php">Cuddle Paws</a>
            </div>
        </nav>
    </header>
<main>
    <div class="account-container">
        <div class="account-detail">
            <h3><?php echo htmlspecialchars($firstname . " " . $lastname); ?></h3>
            <ul>
                <li><a href="#" onclick="showSection('personalDetails')">Personal Details</a></li>
                <li><a href="#" onclick="showSection('orders')">My Orders</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <div class="content">
            <div id="personalDetails" class="content-section active">
                <h3>Personal Details</h3>
                <!-- Correcting the variable names here to match the PHP variables -->
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($firstname); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($lastname); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($phone_num); ?></p>
                <p><strong>Municipality:</strong> <?php echo htmlspecialchars($municipality); ?></p>
                <p><strong>Barangay:</strong> <?php echo htmlspecialchars($barangay); ?></p>
                <p><strong>Phase/Block:</strong> <?php echo htmlspecialchars($phase); ?></p>
            </div>
            <div id="orders" class="content-section">
                <h3>My Orders</h3>
                <p>You don't have any orders yet!</p>
            </div>
        </div>
    </div>
</main>

<script src="js/account.js"></script>
</body>
</html>
