<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


 
 <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-20">
        <div class="container mx-auto px-1 py-3 flex items-center justify-between">
            <div class="flex items-center left-0">
                <a href="dashboard_user.php" class="flex items-center">
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
                <?php
                if (isset($_SESSION["login"])){
                    echo '<a href="logout.php" class="text-gray-700 hover:text-primary px-4 py-2 rounded-full font-medium">Logout</a>';
                } else {
                    echo '<a href="login.php" class="text-gray-700 hover:text-primary px-4 py-2 rounded-full font-medium">Login</a>';
                }
                ?>
                

                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM cart") or die(mysqli_error($conn));
                $row = mysqli_num_rows($select_product);
                ?>
                <?php
                if (isset($_SESSION["login"])){
                    echo '<a href="cart.php" class="relative">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">'.$row.' </span>
                </a>';
                } else {
                    echo '<a href="cart.php" class="relative">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>';
                }
                ?>
                
                <button id="mobile-menu-button" class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>

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