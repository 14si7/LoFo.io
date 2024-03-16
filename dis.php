<?php

// Database credentials for XAMPP
$host = "localhost";
$username = "root";
$password = "";
$database = "login_sample_db";

// Create a connection to the MySQL database
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the 'books' table
$sql = "SELECT * FROM books";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <!-- Add any additional styling or libraries here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ddd;
        }

        img {
            max-width: 100px;
            max-height: 150px;
        }
    </style>
</head>
<body>

<h2>Book List</h2>

<?php
// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of each row in a table
    echo "<table>";
    echo "<tr>
            <th>Title</th>
            <th>Author</th>
            <th>ISBN</th>
            <th>Genre</th>
            <th>Copies Available</th>
            <th>Description</th>
            <th>Thumbnail</th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["author"] . "</td>";
        echo "<td>" . $row["isbn"] . "</td>";
        echo "<td>" . $row["genre"] . "</td>";
        echo "<td>" . $row["copies_available"] . "</td>";
        echo "<td>" . $row["description"] . "</td>";
        echo "<td><img src='" . $row["thumbnail_url"] . "' alt='Book Thumbnail'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No books found in the database.</p>";
}

// Close the database connection
$conn
