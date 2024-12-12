<?php
// Database connection details
$host = 'localhost';
$dbname = 'course';
$username = 'root'; // Change as per your MySQL username
$password = '';     // Change as per your MySQL password

try {
    // Establishing connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitizing and retrieving form data
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $selectcourse = htmlspecialchars($_POST['selectcourse']);
        $address = htmlspecialchars($_POST['address']);

        // SQL query to insert data
        $stmt = $pdo->prepare("INSERT INTO Corse_registration (name, email, phone, selectcourse, address) VALUES (:name, :email, :phone, :selectcourse, :address)");
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':phone' => $phone,
            ':membership' => $selectcourse,
            ':address' => $address
        ]);

        echo "Registration successful!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
