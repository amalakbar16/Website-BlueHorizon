<?php
include("functions.php");
if (isset($_POST["add_to_cart"])) {
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $product_quantity = 1;

    // select data with condotion
    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name='$product_name'");
    if (mysqli_num_rows($select_cart) > 0) {
        $display_message[] = "product already added";
    } else {
        // insert cart data in cart table
        $insert_cart = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', $product_quantity)");
        $display_message[] = "product added";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopt a Coral Reef - BlueHorizon</title>
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

<body class="font-sans">
<<<<<<< HEAD
    
<?php include 'header_user2.php'?>

        <!-- message display -->
=======
   <?php include 'header_user.php' ?> 

>>>>>>> 4047f99ab39dadcac1a9045f77b1f8e04c5168ca
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

    <!-- Page Header -->
    <section class="bg-primary py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold text-white mb-4">Adopt a Coral Reef</h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">Make a direct impact on ocean conservation by adopting a coral reef today.</p>
        </div>
    </section>

    <!-- Adoption Options -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Choose Your Coral</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Each coral adoption directly supports restoration efforts and comes with regular updates on your coral's growth.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">

                <!-- Coral Option 1 -->
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM products");
                if (mysqli_num_rows($select_product) > 0) {
                    $fetch_product = mysqli_fetch_assoc($select_product)
                ?>
                    <form action="" method="post">
                        <!-- Coral Option 1 -->
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                            <div class="relative h-64">
                                <img src="images/Staghorn Coral.jpeg" alt="Staghorn Coral" class="w-full h-full object-cover">
                                <div class="absolute top-4 right-4 bg-primary text-white px-3 py-1 rounded-full text-sm font-medium">Most Popular</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Staghorn Coral</h3>
                                <p class="text-gray-600 mb-4">Fast-growing branching coral that provides essential habitat for reef fish and invertebrates.</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-2xl font-bold text-primary">$45</span>
                                    <span class="text-sm text-gray-500">One-time adoption</span>
                                </div>
                                <ul class="space-y-2 mb-6">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Digital adoption certificate</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Quarterly photo updates</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">GPS location tracking</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Impact reports</span>
                                    </li>
                                </ul>
                                <input type="hidden" name="product_name" value="Staghorn Coral">
                                <input type="hidden" name="product_price" value="45">
                                <input type="hidden" name="product_image" value="Staghorn Coral.jpeg">
                                <button class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium" name="add_to_cart">Adopt Now</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>No Product Available</div>";
                }

                ?>

                <!-- Coral Option 2 -->
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM products");
                if (mysqli_num_rows($select_product) > 0) {
                    $fetch_product = mysqli_fetch_assoc($select_product)
                ?>
                    <form action="" method="post">
                        <!-- Coral Option 2 -->
                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                            <div class="relative h-64">
                                <img src="images/Brain Coral.jpeg" alt="Brain Coral" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Brain Coral</h3>
                                <p class="text-gray-600 mb-4">Slow-growing, long-lived coral that can survive for centuries and supports diverse marine life.</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-2xl font-bold text-primary">$60</span>
                                    <span class="text-sm text-gray-500">One-time adoption</span>
                                </div>
                                <ul class="space-y-2 mb-6">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Digital adoption certificate</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Quarterly photo updates</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">GPS location tracking</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Impact reports</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Virtual diving experience</span>
                                    </li>
                                </ul>
                                <input type="hidden" name="product_name" value="Brain Coral">
                                <input type="hidden" name="product_price" value="60">
                                <input type="hidden" name="product_image" value="Brain Coral.jpeg">
                                <button class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium" name="add_to_cart">Adopt Now</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>No Product Available</div>";
                }
                ?>

                <!-- Coral Option 3 -->
                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM products");
                if (mysqli_num_rows($select_product) > 0) {
                    $fetch_product = mysqli_fetch_assoc($select_product)
                ?>
                    <form action="" method="post">

                        <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                            <div class="relative h-64">
                                <img src="images/Coral Garden.jpeg" alt="Coral Garden" class="w-full h-full object-cover">
                                <div class="absolute top-4 right-4 bg-secondary text-white px-3 py-1 rounded-full text-sm font-medium">Best Value</div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Coral Garden</h3>
                                <p class="text-gray-600 mb-4">Adopt a diverse cluster of corals to create a thriving mini-ecosystem on the reef.</p>
                                <div class="flex justify-between items-center mb-4">
                                    <span class="text-2xl font-bold text-primary">$120</span>
                                    <span class="text-sm text-gray-500">One-time adoption</span>
                                </div>
                                <ul class="space-y-2 mb-6">
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Digital adoption certificate</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Monthly photo updates</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">GPS location tracking</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Detailed impact reports</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Virtual diving experience</span>
                                    </li>
                                    <li class="flex items-start">
                                        <i class="fas fa-check text-green-500 mt-1 mr-2"></i>
                                        <span class="text-gray-600">Personalized video message</span>
                                    </li>
                                </ul>
                                <input type="hidden" name="product_name" value="Coral Garden">
                                <input type="hidden" name="product_price" value="120">
                                <input type="hidden" name="product_image" value="Coral Garden.jpeg">
                                <button class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-medium" name="add_to_cart">Adopt Now</button>
                            </div>
                        </div>
                    </form>
                <?php
                } else {
                    echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>No Product Available</div>";
                }
                ?>
            </div>
        </div>
    </section>

    
    <!-- SHOPIT -->
    <section>
        <div class="bg-gray-50 min-h-screen py-12 px-4 sm:px-6 lg:px-8">
            <section class="max-w-7xl mx-auto">
                <h2 class="text-3xl text-center font-bold text-gray-800 mb-3">Let's Adopt</h2>
                <p class="text-xl text-center mb-12 text-gray-600 max-w-3xl mx-auto">Every adoption helps restore our oceans and brings hope to marine life. You'll receive regular updates on your coral’s progress, so you can watch your impact grow beneath the waves.</p>

                <div class="grid text-center grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    $select_product = mysqli_query($conn, "SELECT * FROM products");
                    if (mysqli_num_rows($select_product) > 0) {
                        while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                    ?>
                            <form action="" method="post">
                                <!-- Product Card 1 -->
                                <div class="bg-white rounded-lg overflow-hidden shadow-md transition-transform duration-300 hover:shadow-lg hover:-translate-y-1">
                                    <div class="relative h-64 overflow-hidden">
                                        <img src="images/<?= $fetch_product['image'] ?>" alt="Coral Garden" class="w-full h-full object-cover">
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-semibold text-dark mb-2"><?= $fetch_product['name'] ?></h3>
                                        <div class="text-primary font-medium mb-4">
                                            Price: $<?= $fetch_product['price'] ?>
                                        </div>
                                        <input type="hidden" name="product_name" value="<?= $fetch_product['name'] ?>">
                                        <input type="hidden" name="product_price" value="<?= $fetch_product['price'] ?>">
                                        <input type="hidden" name="product_image" value="<?= $fetch_product['image'] ?>">
                                        <button type="submit" name="add_to_cart" class="w-full bg-primary hover:bg-primary/90 text-white font-medium py-2 px-4 rounded-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                    <?php
                        }
                    } else {
                        echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>No Product Available</div>";
                    }
                    ?>

                </div>
            </section>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">How Coral Adoption Works</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Your adoption journey from selection to tracking your coral's growth.</p>
            </div>

            <div class="grid md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">1</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Choose Your Coral</h3>
                    <p class="text-gray-600">Select from different coral species based on your preferences and budget.</p>
                </div>

                <!-- Step 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">2</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Adoption</h3>
                    <p class="text-gray-600">Personalize your coral with a name and complete your adoption process.</p>
                </div>

                <!-- Step 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">3</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Receive Updates</h3>
                    <p class="text-gray-600">Get regular photo updates and reports on your coral's growth and health.</p>
                </div>

                <!-- Step 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4 text-white text-xl font-bold">4</div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Track Impact</h3>
                    <p class="text-gray-600">Monitor the environmental impact of your contribution through our dashboard.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gift Options -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Gift a Coral</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Share the joy of conservation with friends and family by gifting a coral adoption.</p>
            </div>

            <div class="bg-light rounded-xl p-8 shadow-sm">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">The Perfect Meaningful Gift</h3>
                        <p class="text-gray-600 mb-6">A coral adoption gift is perfect for birthdays, holidays, or any special occasion. The recipient will receive:</p>

                        <ul class="space-y-3 mb-6">
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-gift text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Personalized digital gift certificate</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-camera text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Regular photo updates of their coral</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-map-marker-alt text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">GPS location of their adopted coral</p>
                            </li>
                            <li class="flex items-start">
                                <div class="flex-shrink-0 w-6 h-6 bg-primary rounded-full flex items-center justify-center mt-1">
                                    <i class="fas fa-chart-line text-white text-xs"></i>
                                </div>
                                <p class="ml-3 text-gray-600">Impact reports showing their contribution</p>
                            </li>
                        </ul>

                        <a href="gift.php" class="inline-block bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-full font-medium">Gift a Coral</a>
                    </div>

                    <div>
                        <img src="images/gift-certificate.png" alt="Gift Certificate" class="rounded-lg shadow-md w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Learn more about our coral adoption program.</p>
            </div>

            <div class="max-w-3xl mx-auto space-y-4">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">How does coral adoption work?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">When you adopt a coral, our team plants and nurtures a coral fragment in your name. You'll receive regular updates with photos and data about your coral's growth and the surrounding ecosystem. Your adoption directly funds our conservation efforts and supports local communities involved in reef restoration.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">Where are your coral restoration sites located?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">We currently have active restoration sites in Indonesia, the Philippines, and Malaysia. Each site is carefully selected based on ecological importance, restoration potential, and community engagement opportunities. We're continuously expanding to new locations to increase our impact.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">How often will I receive updates about my coral?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">Update frequency depends on your adoption package. Standard adoptions receive quarterly updates, while premium packages receive monthly updates. Each update includes recent photos, growth measurements, and information about the surrounding ecosystem's health.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">Can I visit my adopted coral?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">Yes! We offer special diving experiences for coral adopters at our restoration sites. These visits must be arranged in advance and are subject to weather conditions and site accessibility. Contact our team for more information about visiting opportunities.</p>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <button class="flex justify-between items-center w-full text-left focus:outline-none">
                        <h3 class="text-lg font-medium text-gray-800">What happens if my coral doesn't survive?</h3>
                        <i class="fas fa-chevron-down text-primary"></i>
                    </button>
                    <div class="mt-3">
                        <p class="text-gray-600">While our survival rates are high (over 85%), natural events can sometimes affect coral health. If your adopted coral doesn't survive within the first year, we'll replace it at no additional cost and continue to provide updates on the new coral.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer (same as index.html) -->
    <footer class="bg-dark text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <img src="images/logo-white.png" alt="BlueHorizon Logo" class="h-10 mb-4">
                    <p class="text-gray-300 mb-4">Transparent coral reef conservation through technology and community engagement.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="index.html" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="about.html" class="text-gray-300 hover:text-white">About Us</a></li>
                        <li><a href="adopt.html" class="text-gray-300 hover:text-white">Adopt a Coral</a></li>
                        <li><a href="corporate.php" class="text-gray-300 hover:text-white">Corporate Solutions</a></li>
                        <li><a href="blog.php" class="text-gray-300 hover:text-white">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="faq.html" class="text-gray-300 hover:text-white">FAQs</a></li>
                        <li><a href="impact.html" class="text-gray-300 hover:text-white">Our Impact</a></li>
                        <li><a href="locations.html" class="text-gray-300 hover:text-white">Conservation Sites</a></li>
                        <li><a href="tech.html" class="text-gray-300 hover:text-white">Our Technology</a></li>
                        <li><a href="academy.html" class="text-gray-300 hover:text-white">BlueHorizon Academy</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-bold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span>Jl. Raya Rungkut Madya, Surabaya, Indonesia</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2"></i>
                            <span>info@bluehorizon.org</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-2"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400">© 2025 BlueHorizon. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="privacy.html" class="text-gray-400 hover:text-white">Privacy Policy</a>
                    <a href="terms.html" class="text-gray-400 hover:text-white">Terms of Service</a>
                    <a href="cookies.html" class="text-gray-400 hover:text-white">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Cookie Consent -->
    <!-- <div id="cookie-consent" class="fixed bottom-0 left-0 right-0 bg-gray-800 text-white p-4 flex justify-between items-center z-50">
        <p class="text-sm mr-4">This website uses cookies to improve your experience. We'll assume you're ok with this, but you can opt-out if you wish.</p>
        <div class="flex space-x-2">
            <button id="accept-cookies" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded text-sm">Got it</button>
            <button id="more-cookies" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded text-sm">Read More</button>
        </div>
    </div> -->

    <script src="js/main.js"></script>
</body>

</html>