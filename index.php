<?php

session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}
include("functions.php");
include('header.php');

if (isset($_POST["addProduct"])) {
    $productName = $_POST["productName"];
    $productPrice = $_POST["productPrice"];
    $productImage = $_FILES["productImage"]["name"];
    $productImage_temp_name = $_FILES["productImage"]["tmp_name"];
    $productImageFolder = 'images/' . $productImage;

    $insertQuery = mysqli_query($conn, "INSERT INTO products values ('', '$productName', '$productPrice', '$productImage')") or die("insert failed");
    if ($insertQuery) {
        move_uploaded_file($productImage_temp_name, $productImageFolder);
        $display_message = "Product added successfully";
    } else {
        $display_message = "There is some error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

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
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <a href="logout.php">logout</a>

    <!-- FORM -->
    <div class="container mx-auto px-4 py-8 max-w-md mb-7">
        <!-- message display -->
        <?php
        if (isset($display_message)) {
            echo "
    <div class='flex items-start gap-3 bg-[#e0f2fe] text-[#0c4a6e] px-4 py-2 rounded-lg shadow-sm border border-[#06b6d4] mb-4 max-w-md'>
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
        ?>


        <section class="bg-white rounded-lg shadow-md p-6 border border-light">
            <h3 class="text-2xl font-medium text-dark mb-6">Add Products</h3>

            <form action="" class="space-y-4 addProduct" method="post" enctype="multipart/form-data">
                <div>
                    <label for="productName" class="block text-sm font-medium text-dark mb-1">
                        Product Name
                    </label>
                    <input id="productName" name="productName" type="text" placeholder="Enter product name" class="w-full px-4 py-2 rounded-md border border-light focus:outline-none focus:ring-2 focus:ring-accent transition-colors" required />
                </div>

                <div>
                    <label for="productPrice" class="block text-sm font-medium text-dark mb-1">
                        Product Price
                    </label>
                    <input id="productPrice" name="productPrice" type="number" min="0" placeholder="Enter product price" class="w-full px-4 py-2 rounded-md border border-light focus:outline-none focus:ring-2 focus:ring-accent transition-colors" required />
                </div>

                <div>
                    <label for="productImage" class="block text-sm font-medium text-dark mb-1">
                        Product Image
                    </label>
                    <div class="flex items-center">
                        <label class="flex items-center justify-center px-4 py-2 bg-light hover:bg-opacity-80 text-primary rounded-l-md border border-light cursor-pointer transition-colors">
                            <span>Browse</span>
                            <input id="productImage" name="productImage" type="file" class="hidden" required accept="image/png, image/jpg, image/jpeg" />
                        </label>
                        <span class="flex-1 px-4 py-2 border border-l-0 border-light rounded-r-md text-sm truncate file-name">
                            No file chosen
                        </span>
                    </div>
                </div>

                <button type="submit" name="addProduct" class="w-full bg-primary hover:bg-secondary text-white font-medium py-2 px-4 rounded-md transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">Add Product</button>

            </form>
        </section>
    </div>

    <!-- Footer -->
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

    <!-- js file -->
    <script>
        // Get the file input and the span that displays the filename
        const fileInput = document.getElementById('productImage');
        const fileNameDisplay = fileInput.parentElement.nextElementSibling;

        // Add event listener to update the display when a file is selected
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameDisplay.textContent = this.files[0].name;
            } else {
                fileNameDisplay.textContent = 'No file chosen';
            }
        });
    </script>
    <script src="js/script.js"></script>
</body>

</html>