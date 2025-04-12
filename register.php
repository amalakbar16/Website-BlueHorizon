<?php
include("functions.php");

if( isset($_POST["register"])){

    if(register($_POST) > 0){
        $display_message = "Register successfully";
        header("Location: login.php");
    exit;
    }
} else{
    echo mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Form </title>
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

    <!-- Header Start -->
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-1 py-3 flex items-center justify-between">
            <div class="flex items-center left-0">
                <a href="dashboard_user.php" class="flex items-center">
                    <img src="images/BlueHorizon Logo 2.png" alt="BlueHorizon Logo" class="h-16 mr-3">
                </a>
                <div class="ml-4">
                    <img src="images/download.png" alt="B Corp Certified" class="h-20">
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a href="register.php" class="bg-primary hover:bg-primary/90 text-white px-4 py-2 rounded-full font-medium">Register</a>
                <a href="login.php" class="text-gray-700 hover:text-primary font-medium">Login</a>
            </div>
        </div>
    </header>
    <!-- Header End -->
     <!-- message display -->
     <?php
        if (isset($display_message)) {
            echo "
    <div class='flex items-start gap-3 bg-[#e0f2fe] text-[#0c4a6e] px-4 py-2 rounded-lg shadow-sm border border-[#06b6d4]  max-w-full'>
        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5 mt-0.5 text-[#06b6d4]' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z' />
        </svg>
        <div class='flex-1 text-sm font-medium'>$display_message <a href='login.php' class='text-sky-600 underline'>login</a></div>
        <button onclick='this.parentElement.style.display=\"none\";' class='text-[#0c4a6e] hover:text-[#0891b2] transition'>
            <svg xmlns='http://www.w3.org/2000/svg' class='h-4 w-4' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12' />
            </svg>
        </button>
    </div>
    ";
        }
        ?>

    <!-- SIgn Up Form -->
    <div class="container flex flex-col-reverse lg:flex-row lg:justify-between lg:mx-auto lg:mt-14 px-4">
        <div class="max-w-lg mx-auto p-5 font-inter lg:flex-1 lg:w-1/2">
            <!-- form -->
            <form action="" method="post">
                <h2 class="font-bold text-3xl mb-5 text-center lg:text-left">Sign Up</h2>

                <!-- Username -->
                <label for="username">
                    <span class="block font-semibold text-slate-500 text-sm mb-2">Username</span>
                    <input type="text" id="username" name="username" class="px-3 py-2 border shadow rounded-full w-full lg:w-96 h-10 focus:outline-none focus:bg-sky-50 invalid:text-pink-300 invalid:focus:ring-pink-400 invalid:focus:border-pink-400 mb-3" required>
                </label>

                <!-- email -->
                <label for="email">
                    <span class="block font-semibold text-slate-500 text-sm mb-2">Email</span>
                    <input type="email" id="email" name="email" class="px-3 py-2 border shadow rounded-full w-full lg:w-96 h-10 focus:outline-none focus:bg-sky-50 invalid:text-pink-300 invalid:focus:ring-pink-400 invalid:focus:border-pink-400 mb-3" required>
                </label>

                <!-- Password -->
                <label for="password">
                    <span class="block text-sm text-slate-500 mb-2">Password</span>
                    <input type="password" name="password" id="password" class="px-3 py-2 border shadow rounded-full w-full lg:w-96 h-10 focus:outline-none focus:bg-sky-50 invalid:text-pink-300 invalid:focus:ring-pink-400 invalid:focus:border-pink-400 mb-3" required>
                </label>

                <!-- konfirmasi password -->
                <label for="password2">
                    <span class="block text-sm text-slate-500 mb-2">Konfirmasi Password</span>
                    <input type="password" name="password2" id="password2" class="px-3 py-2 border shadow rounded-full w-full lg:w-96 h-10 focus:outline-none focus:bg-sky-50 invalid:text-pink-300 invalid:focus:ring-pink-400 invalid:focus:border-pink-400 mb-3" required>
                    <p class="text-xs text-slate-400 mb-2">ℹ️ Create a strong password with a minimum of 10 characters and a mix of letters, numbers, and symbols.</p>
                </label>

                <!-- User Type -->
                <label for="user_type" class="relative block lg:w-96 w-full mb-3">

                    <div class="mb-3 flex items-start space-x-2">
                        <input type="checkbox" class="mt-1" required>
                        <label class="text-xs text-slate-500">Accept BlueHorizon Terms and Conditions</label>
                    </div>

                    <button type="submit" name="register" class="mt-5 bg-sky-400 text-center rounded-full p-3 text-white uppercase w-full lg:w-96 hover:bg-opacity-80">
                        Create Account
                    </button>

                    <p class="mt-3 text-xs text-center lg:text-left">Already have an account? <a href="login.php" class="text-sky-500 font-bold">Login</a></p>
            </form>
        </div>

        <div class="w-full lg:w-1/2 flex justify-center items-center">
            <img src="images/Download premium image of Tropical sea underwater landscape outdoors_ about cloud, palm tree, scenery, plant, and sky 13922459 (1).jpg" alt="Tropical Sea" class="hidden lg:block rounded-lg w-full h-auto object-cover">
        </div>
    </div>


</body>

</html>