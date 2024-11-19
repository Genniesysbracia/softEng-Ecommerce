<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if the user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="icon" href="https://res.cloudinary.com/dakq2u8n0/image/upload/v1726737021/logocuddlepaws_pcj2re.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/cart.css">
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
    <!-- Shopping Cart Section -->
    <main>
        <h1>Shopping Cart</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="checkbox">
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224064/turkeywithliver_khsioz.webp" alt="Product Image">
                        Brit Premium by Nature 400g
                    </td>
                    <td>P 88.00</td>
                    <td class="quantity">
                        <div class="counter-container">
                            <button id="decrease" class="btn">-</button>
                            <span id="number" class="number">1</span>
                            <button id="increase" class="btn">+</button>
                          </div>
                    </td>
                    <td>P 88.00</td>
                    <td>
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/e_background_removal/f_png/v1727875768/Screenshot_2024-10-02_212816_ngbam0.png" class="delete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox">
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224102/Heartfull_Beef_Chunks_Flavor_in_Gravy_Pouch_100g_jpg_v6zojl.webp" alt="Product Image">
                        Heartful Pouch 100g
                    </td>
                    <td>P 45.00</td>
                    <td class="quantity">
                        <div class="counter-container">
                            <button id="decrease" class="btn">-</button>
                            <span id="number" class="number">1</span>
                            <button id="increase" class="btn">+</button>
                          </div>
                    </td>
                    <td>P 45.00</td>
                    <td>
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/e_background_removal/f_png/v1727875768/Screenshot_2024-10-02_212816_ngbam0.png" class="delete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox">
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224140/903ce3ff199a72ce41e647b92a0d2d08_jpg_fiedqz.webp" alt="Product Image">
                        Vitality Classic Lamb and Beef
                    </td>
                    <td>P 1,270.00</td>
                    <td class="quantity">
                        <div class="counter-container">
                            <button id="decrease" class="btn">-</button>
                            <span id="number" class="number">1</span>
                            <button id="increase" class="btn">+</button>
                          </div>
                    </td>
                    <td>P 1,000.00</td>
                    <td>
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/e_background_removal/f_png/v1727875768/Screenshot_2024-10-02_212816_ngbam0.png" class="delete">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox">
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1728224204/Holisticadult15kg_jpg_cb50mw.webp" alt="Product Image">
                        Holistic Recipe Lamb Meal and Rice
                    </td>
                    <td>P 3,000.00</td>
                    <td class="quantity">
                        <div class="counter-container">
                            <button id="decrease" class="btn">-</button>
                            <span id="number" class="number">1</span>
                            <button id="increase" class="btn">+</button>
                          </div>
                    </td>
                    <td>P 300.00</td>
                    <td>
                        <img src="https://res.cloudinary.com/dakq2u8n0/image/upload/e_background_removal/f_png/v1727875768/Screenshot_2024-10-02_212816_ngbam0.png" class="delete">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="checkout-section">
            <div class="total-price">
                <span>Total:</span>
                <span class="total-amount">P 0.00</span> <!-- Total price displayed here -->
            </div>
            <div>
            <a href="checkout.html"><img src="https://res.cloudinary.com/dakq2u8n0/image/upload/v1727873960/Screenshot_2024-10-02_205721-removebg-preview_yhehq0.png" class="checkout-btn" alt="Checkout Button"></a>
            </div>
        </div>
    </main>
    <script src="js/cart.js"></script>
    <script src="js/updatedNav.js"></script>

</body>
</html>
