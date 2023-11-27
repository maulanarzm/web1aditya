<?php
session_start();

require_once 'connection.php';

// Function to sanitize and validate user input
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Registration
if (isset($_POST['register'])) {
    $username = clean_input($_POST['register_username']); // Update the array key
    $password = clean_input($_POST['register_password']); // Update the array key

    try {
        $stmt = $koneksi->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $password);

        if ($stmt->execute()) {
            echo "Registration successful. You can now login.";
            header("Location: /aditya_uts/login.php?status=success");
            exit();
        } else {
            echo "Error during registration: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Error during registration: " . $e->getMessage();
    }
}

// Login
if (isset($_POST['login'])) {
    $username = clean_input($_POST['login_username']); // Update the array key
    $password = clean_input($_POST['login_password']); // Update the array key

    try {
        $stmt = $koneksi->prepare("SELECT password FROM user WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $stored_password = $stmt->fetchColumn();

        if ($stored_password) {
            if ($password === $stored_password) {
                echo "Login successful. Welcome, $username!";
                header("Location: /aditya_uts/inputdata.php?status=success");
                exit();
            } else {
                echo "Incorrect password.";
                header("Location: /aditya_uts/login.php?status=erorr");
                exit();
            }
        } else {
            echo "Username not found.";
        }
    } catch (PDOException $e) {
        echo "Error during login: " . $e->getMessage();
    }
}
?>
