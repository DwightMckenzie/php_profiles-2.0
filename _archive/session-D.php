<?php
    session_start();
    include ('connection.php');

    $user_check = $_SESSION['lgn_username'];
    $userpassword_check = $_SESSION['lgn_userpassword'];

    $usersql = "SELECT * FROM user_prof WHERE username='$user_check' AND password='$userpassword_check'";
    $userres = $conn->query($usersql);

    if ($row = $userres->fetch_assoc()) {
        $username = $row['username'];
        $user_password = $row['password'];
        $user_fName = $row['firstname'];
        $user_lName = $row['lastname'];
        $user_email = $row['email'];
    } else if (!isset($username) && !isset($user_password)){
        // echo "Hello";
        header('Location: index.php');
    }
    $conn->close();
?>
