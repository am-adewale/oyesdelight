<?php
require_once "config.php";

if (!isLoggedIn()) {
    redirect("login.php");
    exit;
}

$user_id = $_SESSION["user_id"];
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(":id", $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch();
    if (!$user) {
        unset($_SESSION['user_id']);
        redirect("login.php");
        exit;
    }
} catch (PDOException $e) {
    error_log("Query error: " . $e->getMessage());
    die("An error occurred. Please try again later.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oyesdelight Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="navbar-style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
    <div class="container">
        <a href="#" class="logo"><i class="fas fa-utensils"></i> Oyesdelight</a>
        <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <ul class="nav-links">
            <li><a href="#"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="#menu-section"><i class="fas fa-pizza-slice"></i> Menu</a></li>
            <li><a href="#"><i class="fas fa-shopping-bag"></i> Orders</a></li>
            <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>
        </ul>
        <div class="user-actions">
            <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</nav>
    
    <!-- Dashboard Content -->
    <div class="dashboard">
        <div class="container">
            <div class="dashboard-header">
                <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h1>
                <p>Here's an overview of your account and recent orders.</p>
            </div>
            
            <!-- Profile Information -->
            <div class="profile-info">
                <h2>Profile Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <h3>Full Name</h3>
                        <p><?php echo htmlspecialchars($user['full_name']); ?></p>
                    </div>
                    <div class="info-item">
                        <h3>Email Address</h3>
                        <p><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="info-item">
                        <h3>Phone Number</h3>
                        <p><?php echo htmlspecialchars($user['phone']); ?></p>
                    </div>
                    <div class="info-item">
                        <h3>Member Since</h3>
                        <p><?php echo date("F j, Y", strtotime($user['created_at'])); ?></p>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Stats -->
            <div class="dashboard-stats">
                <div class="stat-card">
                    <h3><i class="fas fa-shopping-bag"></i> Total Orders</h3>
                    <p>0</p>
                </div>
                <div class="stat-card">
                    <h3><i class="fas fa-star"></i> Loyalty Points(coming soon)</h3>
                    <p style="color: #ccc;">0</p>
                </div>
                <div class="stat-card">
                    <h3><i class="fas fa-money-bill-wave"></i> Total Spent</h3>
                    <p>#0</p>
                </div>
            </div>

            <!-- Menu Section -->
            <div class="menu-section">
                <h2>Our Menu</h2>
                <div class="menu-grid">
                    <div class="menu-item" data-price="10000">
                        <img src="img/imga.jpg" alt="Stirfry spaghetti">
                        <h3>Stirfry spaghetti ganished with shreded beef, plantain, egg and turkey</h3>
                        <p>₦10,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="7000">
                        <img src="img/imgb.jpg" alt="Jollof rice">
                        <h3>Jollof rice paired with turkey and plantain</h3>
                        <p>₦7,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="7000">
                        <img src="img/imge.jpg" alt="Fried rice">
                        <h3>Stirfry spaghetti paired with turkey, and plantain</h3>
                        <p>₦7,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="10000">
                        <img src="img/imgd.jpg" alt="Ofada rice">
                        <h3>Ofada rice paired with turkey, plantain, and assorted stew</h3>
                        <p>₦10,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="7000">
                        <img src="img/imgk.jpg" alt="Chicken and chips">
                        <h3>Fried rice, plantain with turkey</h3>
                        <p>₦7000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="6000">
                        <img src="img/imgf.jpg" alt="Small chops">
                        <h3>Small chops</h3>
                        <p>₦6,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                     <div class="menu-item" data-price="22000">
                        <img src="img/imgi.jpg" alt="Chicken and chips">
                        <h3>2(two) litre bowl of jollof rice paired with 4(four) medium size turkey</h3>
                        <p>₦22,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="30000">
                        <img src="img/imgh.jpg" alt="Chicken and chips">
                        <h3>2(two)litre goat meat egusi soup</h3>
                        <p>₦30,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="75000">
                        <img src="img/imgj.jpg" alt="Chicken and chips">
                        <h3>2 litre three in one combo(egusi soup, jollof rice and beef soup)</h3>
                        <p>#75,000</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                    <div class="menu-item" data-price="500">
                        <img src="img/imgc.jpg" alt="Chicken and chips">
                        <h3>Fresh zobo drink</h3>
                        <p>₦500</p>
                        <div class="add-to-cart">
                            <input type="number" min="1" value="1" class="quantity">
                            <button class="add-btn">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <p style="text-align: center; margin-top: 20px;">
                    We also sell different soups in bowl sizes and render premium catering services in Lagos.
                </p>
            </div>

            <!-- Cart -->
            <div class="cart"> 
                <h2>Your Cart</h2>
                <div id="cart-items"></div>
                <p>Total: ₦<span id="cart-total">0</span></p>
                <button id="proceed-to-checkout" disabled>Proceed to Checkout</button>
            </div>

            <!-- Checkout Form -->
            <div class="checkout-form">
                <h2>Delivery Details</h2>
                <form id="delivery-form">
                    <label for="name">Name:</label>
                    <input type="text" id="name" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                    <label for="address">Address:</label>
                    <textarea id="address" required></textarea>
                    <label for="contact">Contact:</label>
                    <input type="text" id="contact" required>
                    <button type="submit" class="order-now">Place order Now</button>
                </form>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    console.log('JavaScript loaded successfully');

    // Cart initialization
    const cart = [];
    const addToCartButtons = document.querySelectorAll('.add-btn') || [];
    
    // Set user ID for order submission (missing in original code)
    const userId = <?php echo $user_id; ?>; // Get user ID from PHP session
    window.userId = userId; // Make it available globally

    function updateCartDisplay() {
        const cartItemsDiv = document.getElementById('cart-items');
        const cartTotalElement = document.getElementById('cart-total');
        const proceedButton = document.getElementById('proceed-to-checkout');

        if (!cartItemsDiv || !cartTotalElement || !proceedButton) {
            console.error('Cart elements not found');
            return;
        }

        cartItemsDiv.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            const cartItemHtml = `
                <div class="cart-item">
                    <p>${item.name} - ₦${item.price.toLocaleString()}</p>
                    <div>
                        <button class="decrease-btn" data-index="${index}">-</button>
                        <span>${item.quantity}</span>
                        <button class="increase-btn" data-index="${index}">+</button>
                    </div>
                    <p>₦${itemTotal.toLocaleString()}</p>
                    <button class="remove-btn" data-index="${index}">Remove</button>
                </div>
            `;
            cartItemsDiv.insertAdjacentHTML('beforeend', cartItemHtml);
        });

        cartTotalElement.textContent = total.toLocaleString();
        if (cart.length === 0) {
            cartItemsDiv.innerHTML = '<p>Your cart is empty.</p>';
            proceedButton.disabled = true;
        } else {
            proceedButton.disabled = false;
        }
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', () => {
            console.log('Add to cart clicked');
            const menuItem = button.closest('.menu-item');
            if (!menuItem) {
                console.error('Menu item not found');
                return;
            }

            const nameElement = menuItem.querySelector('h3');
            const name = nameElement ? nameElement.textContent : 'Unknown Item';
            const price = parseFloat(menuItem.dataset.price) || 0;
            const quantityInput = menuItem.querySelector('.quantity');
            const quantity = quantityInput ? (parseInt(quantityInput.value) || 1) : 1;

            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.quantity += quantity;
            } else {
                cart.push({ name, price, quantity });
            }

            updateCartDisplay();
            console.log('Cart updated:', cart);
        });
    });

    // Cart item controls
    const cartItemsDiv = document.getElementById('cart-items');
    if (cartItemsDiv) {
        cartItemsDiv.addEventListener('click', (e) => {
            const index = e.target.dataset.index;
            if (!index) return;

            const idx = parseInt(index);
            if (e.target.classList.contains('increase-btn')) {
                cart[idx].quantity++;
            } else if (e.target.classList.contains('decrease-btn')) {
                if (cart[idx].quantity > 1) {
                    cart[idx].quantity--;
                } else {
                    cart.splice(idx, 1);
                }
            } else if (e.target.classList.contains('remove-btn')) {
                cart.splice(idx, 1);
            }
            updateCartDisplay();
        });
    }

    // Proceed to checkout
    const proceedButton = document.getElementById('proceed-to-checkout');
    if (proceedButton) {
        proceedButton.addEventListener('click', () => {
            const checkoutForm = document.querySelector('.checkout-form');
            if (checkoutForm) {
                checkoutForm.style.display = 'block';
                window.scrollTo({ top: checkoutForm.offsetTop, behavior: 'smooth' });
            } else {
                console.error('Checkout form not found');
            }
        });
    }

    // Form submission
    const deliveryForm = document.getElementById('delivery-form');
    if (deliveryForm) {
        deliveryForm.addEventListener('submit', (e) => {
            e.preventDefault();
            console.log('Form submitted');
            const nameInput = document.getElementById('name');
            const addressInput = document.getElementById('address');
            const contactInput = document.getElementById('contact');

            if (!nameInput || !addressInput || !contactInput) {
                console.error('Form elements not found');
                alert('Form elements not found.');
                return;
            }

            const name = nameInput.value.trim();
            const address = addressInput.value.trim();
            const contact = contactInput.value.trim();
            if (!name || !address || !contact) {
                alert('Please fill all fields.');
                return;
            }

            // Create loading overlay if it doesn't exist
            let loadingOverlay = document.querySelector('.loading-overlay');
            if (!loadingOverlay) {
                loadingOverlay = document.createElement('div');
                loadingOverlay.className = 'loading-overlay';
                loadingOverlay.innerHTML = '<div class="loader"></div><p>Processing your order...</p>';
                loadingOverlay.style.cssText = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.8); display: flex; flex-direction: column; justify-content: center; align-items: center; z-index: 9999;';
                document.body.appendChild(loadingOverlay);
            }
            loadingOverlay.style.display = 'flex';
            
            // Construct message and redirect to WhatsApp directly  
            setTimeout(() => {
                let message = 'Order Details:\n';
                cart.forEach(item => {
                    message += item.name + ' x ' + item.quantity + ' - ₦' + (item.price * item.quantity).toLocaleString() + '\n';
                });
                message += 'Total: ₦' + (document.getElementById('cart-total')?.textContent || '0') + '\n\n';
                message += 'Delivery Details:\nName: ' + name + '\nAddress: ' + address + '\nContact: ' + contact;
                const encodedMessage = encodeURIComponent(message);
                // Replace with your actual WhatsApp business number including country code
                const whatsappNumber = '+2349076622163'; // Example: Nigerian number
                window.location.href = 'https://wa.me/' + whatsappNumber + '?text=' + encodedMessage;
            }, 1000);
        });
    }

    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    if (mobileMenuToggle) {
        mobileMenuToggle.addEventListener('click', () => {
            const navLinks = document.querySelector('.nav-links');
            if (navLinks) {
                navLinks.classList.toggle('active');
            } else {
                console.error('Nav links not found');
            }
        });
    } else {
        console.error('Mobile menu toggle not found');
    }
});
</script>
<script src="navbar.js">