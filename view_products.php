<?php
include("functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Products</title>
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

  <div class="container mx-auto px-4 py-8 max-w-6xl">
    <section class="bg-white rounded-lg shadow-md overflow-hidden">
      <div class="overflow-x-auto">
        <!-- php code -->
        <?php
        $display_product = mysqli_query($conn, "SELECT * FROM products");
        $num = 1;

        if (mysqli_num_rows($display_product) > 0) {
          echo "
                <table class='min-w-full divide-y divide-gray-200'>
                <thead class='bg-primary'>
                  <tr>
                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider'>
                      Sl No
                    </th>
                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider'>
                      Product Image
                    </th>
                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider'>
                      Product Name
                    </th>
                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider'>
                      Product Price
                    </th>
                    <th scope='col' class='px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider'>
                      Action
                    </th>
                  </tr>
                </thead>
                <tbody class='bg-white divide-y divide-light'>";
          // logic to fetch data

          while ($row = mysqli_fetch_assoc($display_product)) {
        ?>

            <!-- display table -->
            <tr class="hover:bg-light transition-colors duration-200">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-dark">
                <?= $num ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="h-28 w-32 rounded-md bg-gray-200 overflow-hidden flex items-center justify-center">
                  <img
                    src="images/<?= $row['image'] ?>"
                    alt="<?= $row['name'] ?>"
                    class="h-full w-full object-cover">
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-dark">
                <?= $row['name'] ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-dark">
                $<?= $row['price'] ?>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-3">
                  <a href="delete.php?delete=<?= $row['id'] ?>" class="delete_product_btn text-red-500 hover:text-red-700 transition-colors" onclick="return confirm('Are you sure want to delete this product?')">
                    <i class="fas fa-trash"></i>
                  </a>
                  <a href="update.php?edit=<?= $row['id'] ?>" class="update_product_btn text-secondary hover:text-accent transition-colors">
                    <i class="fas fa-edit"></i>
                  </a>
                </div>
              </td>
            </tr>
        <?php
            $num++;
          }
        } else {
          echo "<div class='container bg-primary text-center font-medium text-white uppercase tracking-wider mx-auto px-4 py-8 max-w-6xl'>No Product Available</div>";
        }
        ?>

        <!-- You can duplicate this row for more products -->
        </tbody>
        </table>
      </div>
    </section>
  </div>

</body>

</html>