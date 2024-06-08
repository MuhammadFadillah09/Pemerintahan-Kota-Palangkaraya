<?php
session_start();
include 'db_connect.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Insert into registrasi table
    $sql_registrasi = "INSERT INTO registrasi (nama_lengkap, email, username, password) VALUES (?, ?, ?, ?)";
    $stmt_registrasi = $conn->prepare($sql_registrasi);
    $stmt_registrasi->bind_param("ssss", $fullname, $email, $username, $password);

    if ($stmt_registrasi->execute()) {
        // Optionally, you may want to insert into the login table directly
        $sql_login = "INSERT INTO login (username, password) VALUES (?, ?)";
        $stmt_login = $conn->prepare($sql_login);
        $stmt_login->bind_param("ss", $username, $password);

        if ($stmt_login->execute()) {
            header('Location: login.php'); // Redirect to the login page
        } else {
            $_SESSION['error'] = "Registration failed in the login table. Please try again.";
            header('Location: registrasi.php');
        }
    } else {
        $_SESSION['error'] = "Registration failed in the registrasi table. Please try again.";
        header('Location: registrasi.php');
    }

    $stmt_registrasi->close();
    $stmt_login->close();
    $conn->close();
}
?>
