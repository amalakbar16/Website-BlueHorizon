<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include("functions.php");

if (isset($_POST["order_btn"])) {
    $name = $_POST['name'];
    $company = $_POST['company'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    $cart_query = mysqli_query($conn, "SELECT * FROM cart");
    $product_total = 0;
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item["name"] . ' (' . $product_item['quantity'] . ' )';
            $product_price = $product_item["price"] * $product_item['quantity'];
            $price_total += $product_price;
        };
    };
    $total_product = implode(',', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order` VALUES ('', '$name', '$company', '$email', '$country', '$total_product', '$price_total')") or die('query failed');


    if ($cart_query && $detail_query) {
        mysqli_query($conn, "DELETE FROM cart") or die("Query Failed");
        echo '
        <div class="flex flex-col bg-light text-dark p-6 rounded-lg shadow-sm border border-accent max-w-md mx-auto inset-0 z-50 absolute lg:h-1/2 ">
          <!-- Header with icon and close button -->
          <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
              </svg>
              <h3 class="text-lg font-semibold">Thank you for adopting!</h3>
            </div>
            
            <button onclick="this.closest(\'.flex.flex-col\').style.display=\'none\';" class="text-dark hover:text-secondary transition">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
          
          <!-- Order details -->
          <div class="bg-white rounded-md p-4 mb-4 border border-gray-100">
            <h4 class="font-medium text-primary mb-2">Order Details</h4>
            <div class="grid grid-cols-2 gap-2 text-sm">
              <span class="text-gray-600">Total Product:</span>
              <span class="font-medium">' . $total_product . '</span>
              
              <span class="text-gray-600">Total:</span>
              <span class="font-medium">$' . $price_total . '</span>
            </div>
          </div>
          
          <!-- Customer details -->
          <div class="bg-white rounded-md p-4 mb-6 border border-gray-100">
            <h4 class="font-medium text-primary mb-2">Customer Details</h4>
            <div class="grid grid-cols-2 gap-2 text-sm">
              <span class="text-gray-600">Name:</span>
              <span class="font-medium">' . $name . '</span>
              
              <span class="text-gray-600">Company:</span>
              <span class="font-medium">' . $company . '</span>
              
              <span class="text-gray-600">Email:</span>
              <span class="font-medium">' . $email . '</span>
              
              <span class="text-gray-600">Country:</span>
              <span class="font-medium">' . $country . '</span>
            </div>
          </div>
          
          <!-- Continue button -->
            <a href="adopt.php" class="self-center px-6 py-2 mb-9 bg-primary hover:bg-secondary text-white      font-medium rounded-md transition-colors text-center">
                Continue Adopting
            </a>
         
        </div>
        ';
    }
    
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0369a1',
                        secondary: '#0891b2',
                        accent: '#06b6d4',
                        light: '#e0f2fe',
                        dark: '#0c4a6e'
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0">
        <div class="container mx-auto px-1 py-3 flex items-center justify-between">
            <div class="flex items-center left-0">
                <a href="index.php" class="flex items-center">
                    <img src="images/BlueHorizon Logo 2.png" alt="BlueHorizon Logo" class="h-16 mr-3">
                </a>
                <div class="ml-4">
                    <img src="images/download.png" alt="B Corp Certified" class="h-20">
                </div>
            </div>

            <nav class="hidden md:flex space-x-6">
                <a href="#coral-tools" class="text-gray-700 hover:text-primary font-medium">Coral Tools</a>
                <a href="#locations" class="text-gray-700 hover:text-primary font-medium">Locations</a>
                <a href="#tech" class="text-gray-700 hover:text-primary font-medium">Tech</a>
                <a href="#reefs-plus" class="text-gray-700 hover:text-primary font-medium">REEFS+</a>
                <a href="#academy" class="text-gray-700 hover:text-primary font-medium">Academy</a>
                <a href="#blog" class="text-gray-700 hover:text-primary font-medium">Blog</a>
                <a href="#about" class="text-gray-700 hover:text-primary font-medium">About</a>
            </nav>

            <div class="flex items-center space-x-4">
                <a href="adopt.php" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-full font-medium">Adopt Coral</a>
                <a href="login.php" class="text-gray-700 hover:text-primary font-medium">Log In</a>
                <!-- select query -->
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM cart") or die(mysqli_error($conn));
                $row = mysqli_num_rows($select_product);
                ?>
                <a href="cart.php" class="relative">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center"><?= $row ?></span>
                </a>
                <button id="mobile-menu-button" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        <!-- message display -->
        <?php
        if (isset($display_message)) {
            foreach ($display_message as $display_message) {
                echo "
    <div class='flex items-start gap-3 bg-[#e0f2fe] text-[#0c4a6e] px-4 py-2 rounded-lg shadow-sm border border-[#06b6d4]  max-w-full'>
        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 mt-0.5 text-[#06b6d4]' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z' />
        </svg>
        <div class='flex-1 text-sm font-medium'>$display_message</div>
        <button onclick='this.parentElement.style.display=\"none\";' class='text-[#0c4a6e] hover:text-[#0891b2] transition'>
            <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' />
            </svg>
        </button>
    </div>
    ";
            }
        }
        ?>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t">
            <div class="container mx-auto px-4 py-3 space-y-3">
                <a href="#coral-tools" class="block text-gray-700 hover:text-primary font-medium">Coral Tools</a>
                <a href="#locations" class="block text-gray-700 hover:text-primary font-medium">Locations</a>
                <a href="#tech" class="block text-gray-700 hover:text-primary font-medium">Tech</a>
                <a href="#reefs-plus" class="block text-gray-700 hover:text-primary font-medium">REEFS+</a>
                <a href="#academy" class="block text-gray-700 hover:text-primary font-medium">Academy</a>
                <a href="#blog" class="block text-gray-700 hover:text-primary font-medium">Blog</a>
                <a href="#about" class="block text-gray-700 hover:text-primary font-medium">About</a>
            </div>
        </div>
    </header>




    <div class="bg-gray-50 min-h-screen py-12 px-4">
        <div class="max-w-3xl mx-auto">
            <section class="mb-8">
                <h1 class="text-3xl font-bold text-dark mb-8 text-center">Finalize your order</h1>

                <form action="" method="post">
                    <!-- Billing Details -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6 overflow-hidden">
                        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-dark">Billing details</h2>
                        </div>

                        <div class="p-6 space-y-4">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Your name <sup class="text-red-500">*</sup>
                                </label>
                                <input
                                    type="text"
                                    placeholder="Enter your name"
                                    name="name"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Company name (optional)
                                </label>
                                <input
                                    type="text"
                                    placeholder="Company name"
                                    name="company"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Email address <sup class="text-red-500">*</sup>
                                </label>
                                <input
                                    type="email"
                                    placeholder="Email"
                                    name="email"
                                    required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                            </div>

                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Country / Region <sup class="text-red-500">*</sup>
                                </label>
                                <div class="relative">
                                    <select
                                        name="country"
                                        id="country"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary">
                                        <option value="Indonesia" selected>Indonesia</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Norwegia">Norwegia</option>
                                        <option value="Canada">Canada</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 mb-6 overflow-hidden">
                        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
                            <h2 class="text-lg font-medium text-dark">Order summary</h2>
                        </div>

                        <div class="p-6">
                            <?php
                            $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                            $total = 0;
                            $grand_total = 0;

                            if (mysqli_num_rows($select_cart) > 0) {
                                while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                    $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                                    $grand_total += $total_price;
                            ?>
                                    <div class="flex justify-between py-2 border-b border-gray-100">
                                        <span class="text-gray-700"><?= $fetch_cart['name'] ?> (<?= $fetch_cart['quantity'] ?>)</span>
                                        <span class="font-medium">$<?= $total_price ?></span>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<div class='bg-primary text-center font-medium text-white py-3 rounded-md'>Cart is empty</div>";
                            }
                            ?>
                            <!-- Total -->
                            <div class="flex justify-between items-center py-4">
                                <span class="font-medium text-gray-700">Total</span>
                                <span class="text-xl font-bold text-dark">$<?= $grand_total ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="mb-6 flex items-start">
                        <input
                            type="checkbox"
                            id="terms"
                            name="terms"
                            required
                            class="mt-1 mr-2">
                        <label for="terms" class="text-sm text-gray-700">
                            I have read and agree to the website
                            <a href="#" class="text-primary hover:text-secondary">terms and conditions</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button
                        type="submit"
                        name="order_btn"
                        id="order_btn"
                        class="w-full bg-primary hover:bg-secondary text-white font-medium py-3 px-4 rounded-md transition-colors">
                        Place Order
                    </button>
                </form>
            </section>
        </div>
    </div>
</body>

</html>