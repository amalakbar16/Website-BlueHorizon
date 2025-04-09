<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BlueHorizon</title>
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
<body class="font-sans bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-1 py-3 flex items-center justify-between">
            <div class="flex items-center left-0">
                <a href="index.html" class="flex items-center">
                    <img src="img/BlueHorizon Logo 2.png" alt="BlueHorizon Logo" class="h-16 mr-3">
                    <span class="text-2xl font-bold text-primary mr-3">BlueHorizon</span>
                </a>
                <div class="ml-4">
                    <img src="img/download.png" alt="B Corp Certified" class="h-20">
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
                <a href="cart.php" class="relative">
                    <i class="fas fa-shopping-cart text-gray-700 text-xl"></i>
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
                </a>
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

    <!-- Login Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-md mx-auto bg-white rounded-xl shadow-sm p-8">
                <div class="text-center mb-8">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Welcome Back</h1>
                    <p class="text-gray-600">Sign in to access your coral dashboard</p>
                </div>
                
                <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <?php echo $error; ?>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" id="username" name="username" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                    </div>
                    
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary focus:border-primary" required>
                        <div class="flex justify-end mt-1">
                            <a href="forgot-password.php" class="text-sm text-primary hover:underline">Forgot password?</a>
                        </div>
                    </div>
                    <label for="remember">
                        <input type="checkbox" name="remember" id="remember">
                        <span class="inline-block text-sm text-slate-500 mb-2">Remember me</span>
                    </label>
                    
                    <button type="submit" name="login" class="w-full bg-primary hover:bg-primary/90 text-white py-2 rounded-lg font-medium">Sign In</button>
                </form>
                
                <div class="mt-6 text-center">
                    <p class="text-gray-600">Don't have an account? <a href="register.php" class="text-primary hover:underline">Sign up</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-12 mt-12">
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

    <script src="js/main.js"></script>
</body>
</html>

