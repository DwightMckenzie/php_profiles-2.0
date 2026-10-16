<?php
    $conn = new mysqli('localhost','Dwight1980','Mckenzie1980%','profile_db');

    if (!$conn) {
        die("Connection failed: " . $conn->connect_error());
    }

    echo "Connected Successfully";

    // Close connection
    // mysqli_close($conn);
    $conn->close();
?>
