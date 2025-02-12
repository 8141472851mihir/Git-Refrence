<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $last = $_POST['last'] ?? '';

    // Simulate form processing
    echo "<h2>Form Submission Successful!</h2>";
    echo "<p><strong>Username:</strong> " . htmlspecialchars($username) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($password) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($last) . "</p>";
}
?>
