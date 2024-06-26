<?php
// Configurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webwisata"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah data dikirimkan melalui metode POST
if (php_sapi_name() !== 'cli') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lanjutkan dengan proses pemesanan
        // Ambil data dari form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $datetime = $_POST['datetime'];
        $destination = $_POST['destination'];
        $message = $_POST['message'];

    // SQL query untuk memasukkan data ke tabel bookings
    $sql = "INSERT INTO booking (name, email, datetime, destination, message) VALUES ('$name', '$email', '$datetime', '$destination', '$message')";

    // Eksekusi query dan cek apakah data berhasil disimpan
    if ($conn->query($sql) === TRUE) {
        // Booking berhasil disimpan
        echo '<script>alert("Booking berhasil disimpan!");</script>';
        echo '<script>window.location.href = "booking.html";</script>';
    } else {
        // Terjadi error saat menyimpan data
        echo '<script>alert("Error: ' . $sql . '\n' . $conn->error . '");</script>';
        echo '<script>window.location.href = "booking.html";</script>';
    }
} else {
    // Metode pengiriman data tidak valid
    echo "Metode pengiriman data tidak valid.";
}
}

// Menutup koneksi
$conn->close();
?>
