<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webwisata";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form dan validasi
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Debug output
    echo "Username or Email: " . $user . "<br>";
    echo "Password: " . $pass . "<br>";

    // Ambil data user dari database dengan prepared statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $user, $user);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_pass);
    $stmt->fetch();

    if ($stmt->num_rows > 0) {
        // Cek password
        if (password_verify($pass, $hashed_pass)) {
            echo "<script>alert('Login berhasil'); window.location.href = 'index.html';</script>";
        } else {
            echo "<script>alert('Password salah'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Username atau Email tidak ditemukan'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Form tidak lengkap'); window.history.back();</script>";
}

$conn->close();
?>
