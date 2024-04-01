<?php
// Step 1: Connect to the database
$servername = "sql6.freesqldatabase.com";
$username = "sql6695773";
$password = "7wcDt5kpey";
$database = "sql6695773";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Execute SQL query to get last row
$sql = "SELECT * FROM coba ORDER BY id DESC LIMIT 1";  // Assuming 'id' is your auto-increment primary key
$result = $conn->query($sql);

// Step 3: Fetch data
if ($result->num_rows > 0) {
    // Output data of the last row
    $row = $result->fetch_assoc();
    $data = $row["data"];
    echo json_encode($data); // Send data back as JSON
} else {
    echo "0 results";
}

// Step 4: Close connection
$conn->close();
?>
