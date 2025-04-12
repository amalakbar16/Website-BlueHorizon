<?php
    // koneksi database

$conn = mysqli_connect("localhost","root","","bluehorizontest") or die("Connection Failed");


function register($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = $_POST["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    
    //cek konfirmasi password
    if( $password !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if( mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah ada!')
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    // tambahkan userbaru ke database 
    $result = mysqli_query($conn, "INSERT INTO users (username, email, password, user_type) VALUES ('$username', '$email', '$password', 'user')");
    return mysqli_affected_rows($conn);
}

?>