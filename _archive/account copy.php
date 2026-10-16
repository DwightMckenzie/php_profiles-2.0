<?php
    $conn = new mysqli('localhost','Dwight1980','ABC123%','profile_db');

    if (!$conn) {
        die("Connection failed: " . $conn->connect_error());
    }

    // $sql = "SELECT * FROM admin WHERE id";
    // $adminResult = mysqli_query($conn, $sql);

    // runs query according to the button selected
    if(isset($_POST['button']))  {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $admincode = $_POST['admincode'];

        switch ($_POST['button']) {
            case "updateAdmin":
                echo "switch, case, update";

                $sql = "UPDATE admin SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', password='$password', admincode='$admincode' WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Administrator successfully updated</p>";
                } else {
                    print_r(mysqli_error_list($conn));
                }

                mysqli_close($conn);
            break;
            case "deleteAdmin":
                echo "switch, case, delete <br>";

                $sql = "DELETE FROM admin WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Administrator successfully deleted</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            break;
            case "saveAdmin":
                echo "switch, case, saved";

                $sql = "INSERT INTO admin (firstname,lastname,email,username,password,admincode) VALUES ('{$firstname}','{$lastname}','{$email}','{$username}','{$password}','{$admincode}')";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Administrator successfully added</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            break;
            case "updateProf":
                echo "switch, case, update";

                $sql = "UPDATE profiles SET firstname='$firstname', lastname='$lastname', email='$email', username='$username', password='$password' WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Profile successfully updated</p>";
                } else {
                    print_r(mysqli_error_list($conn));
                }

                mysqli_close($conn);
            break;
            case "deleteProf":
                echo "switch, case, delete <br>";

                $sql = "DELETE FROM profiles WHERE id='$id'";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Profile successfully deleted</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            break;
            case "saveProf":
                echo "switch, case, saved";

                $sql = "INSERT INTO profiles (firstname,lastname,email,username,password) VALUES ('{$firstname}','{$lastname}','{$email}','{$username}','{$password}')";

                if (mysqli_query($conn, $sql)) {
                    echo "<p>Profile successfully added</p>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);
            break;
        }
    }

?>
