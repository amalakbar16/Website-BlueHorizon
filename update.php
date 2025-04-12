<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include 'functions.php';

if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    
    // Ambil data gambar
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'images/' . $product_image;

    // Ambil gambar lama dari hidden input
    $old_image = $_POST['old_image'];

    // Cek apakah ada gambar baru diupload
    if (!empty($product_image)) {
        // Gambar baru diupload
        move_uploaded_file($product_image_tmp, $product_image_folder);
    } else {
        // Tidak upload gambar baru, pakai gambar lama
        $product_image = $old_image;
    }

    $update_product = mysqli_query($conn, "UPDATE products SET 
        name = '$product_name',
        price = '$product_price',
        image = '$product_image' 
        WHERE id = $product_id
    ");

    if ($update_product) {
        header("Location: view_products.php");
        exit;
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
    <title>Update Product</title>
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
    <!-- header -->
    <?php include 'header.php' ?>
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

    <section class="max-w-md mx-auto p-6">
        <!-- PHP CODE -->
        <?php
        if (isset($_GET['edit'])) {
            $edit_id = $_GET['edit'];

            $edit_query = mysqli_query($conn, "SELECT * FROM products WHERE id=$edit_id");
            if (mysqli_num_rows($edit_query) > 0) {
                $fetch_data = mysqli_fetch_assoc($edit_query);
        ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="bg-primary px-6 py-4">
                        <h2 class="text-xl font-semibold text-white">Edit Product</h2>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data" class="p-6 space-y-6">
                        <!-- Current Product Image Preview -->
                        <div class="flex justify-center">
                            <div class="relative w-32 h-32 rounded-md overflow-hidden bg-light border border-gray-200">
                                <img src="images/<?= $fetch_data['image'] ?>" alt="<?= $fetch_data['name'] ?> image" class="w-full h-full object-cover" id="image-preview">
                                <div class="absolute inset-0 flex items-center justify-center text-gray-400" id="no-image">
                                </div>
                            </div>
                        </div>

                        <!-- Hidden Product ID -->
                        <input type="hidden" name="product_id" value="<?= $fetch_data['id'] ?>">

                        <!-- Product Name -->
                        <div class="space-y-2">
                            <label for="product-name" class="block text-sm font-medium text-dark">
                                Product Name
                            </label>
                            <input
                                type="text"
                                id="product-name"
                                name="product_name"
                                value="<?= $fetch_data['name'] ?>"
                                required
                                class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-colors"
                                placeholder="Enter product name">
                        </div>

                        <!-- Product Price -->
                        <div class="space-y-2">
                            <label for="product-price" class="block text-sm font-medium text-dark">
                                Product Price
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
                                <input
                                    type="number"
                                    id="product-price"
                                    name="product_price"
                                    value="<?= $fetch_data['price'] ?>"
                                    required
                                    min="0"
                                    step="0.01"
                                    class="w-full pl-8 pr-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent transition-colors"
                                    placeholder="0.00">
                                <!-- Simpan nama gambar lama -->
                                <input type="hidden" name="old_image" value="<?= $fetch_data['image'] ?>">
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div class="space-y-2">
                            <label for="product-image" class="block text-sm font-medium text-dark">
                                Product Image
                            </label>
                            <div class="flex items-center">
                                <label class="flex items-center justify-center px-4 py-2 bg-light hover:bg-opacity-80 text-primary rounded-l-md border border-gray-300 cursor-pointer transition-colors">
                                    <span>Browse</span>
                                    <input
                                        type="file"
                                        id="product-image"
                                        name="product_image"
                                        accept="image/png, image/jpg, image/jpeg"
                                        class="hidden"
                                        onchange="displayImagePreview(this)">
                                </label>
                                <span id="file-name" class="flex-1 px-4 py-2 border border-l-0 border-gray-300 rounded-r-md text-sm truncate">
                                    No file chosen
                                </span>
                            </div>
                            <p class="text-xs text-gray-500">Accepted formats: PNG, JPG, JPEG</p>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end space-x-3 pt-4">
                            <a href="#" id="close-edit" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-pink-500">
                                Cancel
                            </a>
                            <button
                                type="submit"
                                name="update_product"
                                class="px-6 py-2 bg-primary hover:bg-primary/90 text-white font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>

    </section>


    <script>
        function displayImagePreview(input) {
            const fileNameSpan = document.getElementById('file-name');

            if (input.files && input.files.length > 0) {
                fileNameSpan.textContent = input.files[0].name;
            } else {
                fileNameSpan.textContent = "No file chosen";
            }
        }
    </script>



</body>

</html>