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
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $email = $_POST['email'];

    // Debug output
    echo "Username: " . $user . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password: " . $pass . "<br>";

    // Enkripsi password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Debug output
    echo "Hashed Password: " . $hashed_pass . "<br>";

    // Simpan data ke database dengan prepared statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $hashed_pass);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil'); window.location.href = 'login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.history.back();</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('Form tidak lengkap'); window.history.back();</script>";
}

$conn->close();
?>
