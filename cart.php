
<?php 
include 'functions.php'; 

// update query
if ( isset($_POST['update_cart_quantity'])) {
    $update_quantity = $_POST['update_quantity'];
    $cart_id_quantity = $_POST['cart_id_quantity'];

    $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity=$update_quantity WHERE id=$cart_id_quantity");

    if ($update_quantity_query) {
        header("Location: cart.php");
        $display_message = "Product added successfully";
    }
}

if (isset($_GET["remove"])) {
    $remove_id = $_GET["remove"];

    $delete_query = mysqli_query($conn,"DELETE FROM cart WHERE id=$remove_id");
    if ($delete_query) {
        header("Location: cart.php");
    } else {
        header("Location: cart.php");
    }
}

if (isset($_GET["delete_all"])) {
    mysqli_query($conn, "DELETE FROM cart") or die("Query Failed");
    header("Location: cart.php");
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page - BlueHorizon</title>
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
        <?php include 'header_user.php' ?>        

        <!-- MY Cart -->
        <div class="bg-white min-h-screen">
            <section class="max-w-6xl mx-auto px-4 py-12">
                <h1 class="text-4xl font-bold text-dark mb-8 text-center">My Cart</h1>

                <!-- Cart Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8">
                    <div class="overflow-x-auto">
                        <table class="w-full mb-8 border-collapse">
                            <?php
                            $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                            $num=1;
                            $grand_total=0;
                            if (mysqli_num_rows($select_cart) > 0) {
                                echo '
                                <thead>
                                    <tr class="bg-light border-b border-gray-200">
                                        <th class="py-4 px-6 text-left font-medium text-dark">S1</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Product Name</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Product Image</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Product Price</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Product Quantity</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Total Price</th>
                                        <th class="py-4 px-6 text-left font-medium text-dark">Action</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                while ($fetch_cart_product = mysqli_fetch_assoc($select_cart)) {
                            ?>
                                    <tr class="border-b border-gray-100 hover:bg-light">
                                        <td class="py-4 px-6"><?= $num ?></td>
                                        <td class="py-4 px-6"><?= $fetch_cart_product['name'] ?></td>
                                        <td class="py-4 px-6">
                                            <img src="images/<?= $fetch_cart_product['image'] ?>" alt="Coral Garden" class="w-20 h-20 object-cover rounded">
                                        </td>
                                        <td class="py-4 px-6 text-dark">$<?= $fetch_cart_product['price'] ?></td>
                                        <td class="py-4 px-6">
                                            <form action="" method="post">
                                                <input type="hidden" value="<?= $fetch_cart_product['id'] ?>" name="cart_id_quantity">
                                            <div class="flex items-center space-x-2">
                                                <input
                                                    type="number"
                                                    min="1"
                                                    value="<?= $fetch_cart_product['quantity'] ?>"
                                                    name="update_quantity"
                                                    class="w-16 px-2 py-1 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-primary">
                                                <input
                                                    type="submit"
                                                    value="Update"
                                                    name="update_cart_quantity"
                                                    class="bg-primary hover:bg-secondary text-white px-3 py-1 rounded text-sm cursor-pointer transition-colors">
                                            </div>
                                            </form>
                                        </td>
                                        <td class="py-4 px-6 font-medium text-dark">$<?= $subtotal=number_format(($fetch_cart_product['price'] * $fetch_cart_product['quantity'])) ?></td>
                                        <td class="py-4 px-6">
                                            <a href="cart.php?remove=<?= $fetch_cart_product['id']?>" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700 transition-colors">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                            <?php
                            $grand_total=$grand_total+$subtotal;
                            $num++;
                                }
                            } else {
                                echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>Cart is empty</div>";
                            }
                            ?>


                            <!-- More rows can be added here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- php code -->
                <?php
if ($grand_total > 0) {
    echo "<!-- Bottom Area - EcoMatcher Style -->
    <div class='flex justify-between items-center border-t border-gray-200 pt-6 pb-4'>
        <!-- Left: Continue Adopt -->
        <div>
            <a href='adopt.php' class='text-primary hover:text-secondary transition-colors font-medium'>
                <i class='fas fa-arrow-left mr-2'></i>
                Continue Adopt
            </a>
        </div>

        <!-- Right: Total + Checkout -->
        <div class='flex items-center gap-4'>
            <div class='text-right'>
                <span class='text-lg font-medium mr-2'>Total:</span>
                <span class='text-xl font-bold text-dark'>$$grand_total</span>
            </div>

            <a
                href='checkout.php'
                class='px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded transition-colors'>
                Proceed to checkout
            </a>
        </div>
    </div>";

?>

                <!-- Delete All Button -->
                <div class="mb-8">
                    <a href="cart.php?delete_all" class="text-red-500 hover:text-red-700 transition-colors font-medium" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash mr-2"></i>
                        Delete All
                    </a>
                </div>
                <?php
            } else {
                echo "";
            }

            ?>
                

            </section>
        </div>
</body>

</html>