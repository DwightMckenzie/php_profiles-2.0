<?php
    $db_host = "localhost";
    $db_name = "profiles_db";
    $db_user = "dwight1980";
    $db_pass = "Mckenzie1980%";

    try {
        //
		$conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        
		// set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
