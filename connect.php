<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $dis = $_POST['dis'];
    $number = $_POST['number'];
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'login_sample_db');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed: " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO registration (firstName, lastName, gender, email, dis, number) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $dis, $number);
        $execval = $stmt->execute();
        $stmt->close();
        $conn->close();

        // Redirect to data.php
        header("Location: data.php");
        exit(); // Ensure no more output is sent
    }
?>
