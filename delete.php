<!-- delete logic -->

<!-- php code -->
<?php
session_start();

if( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

include("functions.php");

if ( isset( $_GET['delete'])){
    $delete_id = $_GET['delete'];

    $delete_query = mysqli_query($conn, "DELETE FROM products WHERE id = $delete_id") or die("Query Failed");
    if ( $delete_query) {
        echo"Product Deleted";
        header("Location: view_products.php");
    } else {
        echo"Product not Deleted";
        header("Location: view_products.php");
    }
}

?>