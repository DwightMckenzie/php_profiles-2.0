<?php
    include ('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $login_fName; ?> <?php echo $login_lName; ?></title>
        <!-- <link href="style.css" rel="stylesheet" type="text/css"> -->
    </head>
    <body>
        <div id="profile">
            <b id="">First Name: <i><?php echo $login_fName; ?></i></b><br>
            <b id="">Last Name: <i><?php echo $login_lName; ?></i></b><br>
            <b id="">Email: <i><?php echo $login_email; ?></i></b><br>
            <b id="">Username: <i><?php echo $login_user; ?></i></b><br>
            <b id="">Password: <i><?php echo $login_password; ?></i></b>
            <br><br>
            <b id="logout"><a href="logout.php">Log Out</a>
        </div>
    </body>
</html>
