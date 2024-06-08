<?php
session_start();
include 'db_connect.php'; // Ensure this path is correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id_login, password FROM login WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id_login, $hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $id_login;
        header('Location: dashboard.php'); // Redirect to the dashboard
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header('Location: login.php');
    }

    $stmt->close();
    $conn->close();
}
?>
