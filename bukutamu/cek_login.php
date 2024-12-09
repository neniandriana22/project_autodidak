<?php
// cek_login.php

// Memulai sesi
session_start();

// Sertakan file koneksi.php
include 'koneksi.php'; // Pastikan file koneksi.php berada di lokasi yang sesuai

// Fungsi untuk membersihkan input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Memeriksa apakah form login telah dikirim
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Ambil data username dan password dari form login
    $input_username = clean_input($_POST['username']);
    $input_password = clean_input($_POST['password']);

    // Query untuk memeriksa pengguna berdasarkan username
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($input_password, $user['password'])) {
            // Login berhasil, simpan data di sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect ke halaman dashboard atau halaman utama
            header("Location: index.php");
            exit();
        } else {
            // Password salah
            $error_message = "Password salah.";
        }
    } else {
        // Username tidak ditemukan
        $error_message = "Username tidak ditemukan.";
    }
    $stmt->close();
}
?>

<!-- Form login -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="cek_login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>