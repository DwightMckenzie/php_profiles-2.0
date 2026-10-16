<?php
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    include ('connection.php');

    if(isset($_POST['submit'])){
        switch ($_POST['submit']) {
            case 'user':
                $username = $_POST['username'];
                $userpassword = $_POST['userpassword'];

                // echo "Hello user login.php";
                if (empty($_POST['username']) || empty($_POST['userpassword'])) {
                    $error = '<div class="alert alert-warning" role="alert">Username or Password empty</div>';
                } else {

                    $username = stripslashes($username);
                    $userpassword = stripslashes($userpassword);
                    $username = $conn->real_escape_string($username);
                    $userpassword = $conn->real_escape_string($userpassword);

                    $sql = "SELECT * FROM user_prof WHERE username='$username' AND password='$userpassword'";
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();

                    if ($username == $row['username'] && $userpassword == $row['password']) {
                        $_SESSION['lgn_username'] = $username;
                        $_SESSION['lgn_userpassword'] = $userpassword;
                        header("location: user.php");
                    } else {
                        // $error = "Username or Password is invalid";
                        $error = '<div class="alert alert-danger" role="alert">Username or Password is invalid</div>';
                    }
                }
                $conn->close();
            break;
            case 'admin':
                // echo "Hello admin login.php";
                if (empty($_POST['adminname']) || empty($_POST['adminpassword']) || empty($_POST['admincode'])) {
                    $error = '<div class="alert alert-warning" role="alert">Administrator, Password, or Code is empty</div>';
                } else {
                    $adminname = $_POST['adminname'];
                    $adminpassword = $_POST['adminpassword'];

                    $adminname = stripslashes($adminname);
                    $adminpassword = stripslashes($adminpassword);
                    $adminname = $conn->real_escape_string($adminname);
                    $adminpassword = $conn->real_escape_string($adminpassword);

                    $sql = "SELECT * FROM admin_prof WHERE username='$adminname' AND password='$adminpassword'";
                    $res = $conn->query($sql);
                    $row = $res->fetch_assoc();

                    if ($adminname == $row['username'] && $adminpassword == $row['password'] ) {
                        $_SESSION['lgn_adminname'] = $adminname;
                        $_SESSION['lgn_adminpassword'] = $adminpassword;
                        header("location: admin.php");
                    } else {
                        $error = '<div class="alert alert-danger" role="alert">Administrator, Password, or Code is invalid</div>';
                    }
                }
                $conn->close();
            break;
            case 'register':
                // echo "Hello register login.php";
                if (empty($_POST['regname']) || empty($_POST['regemail'])) {
                    $error = '<div class="alert alert-warning" role="alert">Please fill in Usernmae or Email under Register tab.</div>';
                } else {
                    echo "going through ";

                    ////////////////////////////////////////////////////////////////////////////////////////////////
                    // 1 insert new user name and Email to database
                    // 2 have function generate temp Password
                    // 3 after temp password generated email is sent to new user to use and login in to their account
                    /////////////////////////////////////////////////////////////////////////////////////////////////

                    if(isset($_POST['regemail'])) {
                        $regEmail = $_POST['regemail'];
                        $regName = $_POST['regname'];
                        $regPassword = '';

                        // $regName = $_POST['regname'];
                        // $regEmail = $_POST['regemail'];

                        // EDIT THE 2 LINES BELOW AS REQUIRED
                        $email_to = $regEmail;
                        $email_subject = "Your password";

                        function died($error) {
                            // your error code can go here
                            echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                            echo "These errors appear below.<br /><br />";
                            echo $error."<br /><br />";
                            echo "Please go back and fix these errors.<br /><br />";
                            die();
                        }

                        // validation expected data exists
                        // if( !isset($regName) || !isset($regEmail)) {
                        //     died('We are sorry, but there appears to be a problem with the form you submitted.');
                        // }

                        // echo "" . $regName . "";

                        // $sql = "INSERT INTO profiles (firstname,lastname,email,username,password) VALUES ('{$firstname}','{$lastname}','{$regEmail}','{$regName}','{$password}')";
                        $sql = "INSERT INTO profiles (email,username,password) VALUES ('{$regEmail}','{$regName}','{$regPassword}')";
                        $res = $conn->query($sql);

                        // if (mysqli_query($conn, $sql)) {
                        if ($res) {
                            echo "<p>Profile successfully added</p>";
                        } else {
                            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    }
                    //     $first_name = $_POST['first_name']; // required
                    //     $last_name = $_POST['last_name']; // required
                    //     $email_from = $_POST['email']; // required
                    //     $telephone = $_POST['telephone']; // not required
                    //     $comments = $_POST['comments']; // required
                    //
                    //     $error_message = "";
                    //     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                    //
                    //   if(!preg_match($email_exp,$email_from)) {
                    //     $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
                    //   }
                    //
                    //     $string_exp = "/^[A-Za-z .'-]+$/";
                    //
                    //   if(!preg_match($string_exp,$first_name)) {
                    //     $error_message .= 'The First Name you entered does not appear to be valid.<br />';
                    //   }
                    //
                    //   if(!preg_match($string_exp,$last_name)) {
                    //     $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
                    //   }
                    //
                    //   if(strlen($comments) < 2) {
                    //     $error_message .= 'The Comments you entered do not appear to be valid.<br />';
                    //   }
                    //
                    //   if(strlen($error_message) > 0) {
                    //     died($error_message);
                    //   }
                    //
                    //     $email_message = "Form details below.\n\n";
                    //
                    //
                    //     function clean_string($string) {
                    //       $bad = array("content-type","bcc:","to:","cc:","href");
                    //       return str_replace($bad,"",$string);
                    //     }
                    //
                    //
                    //
                    //     $email_message .= "First Name: ".clean_string($first_name)."\n";
                    //     $email_message .= "Last Name: ".clean_string($last_name)."\n";
                    //     $email_message .= "Email: ".clean_string($email_from)."\n";
                    //     $email_message .= "Telephone: ".clean_string($telephone)."\n";
                    //     $email_message .= "Comments: ".clean_string($comments)."\n";
                    //
                    // // create email headers
                    // $headers = 'From: '.$email_from."\r\n".
                    // 'Reply-To: '.$email_from."\r\n" .
                    // 'X-Mailer: PHP/' . phpversion();
                    // @mail($email_to, $email_subject, $email_message, $headers);
                }
                //     $adminname = $_POST['adminname'];
                //     $adminpassword = $_POST['adminpassword'];
                //
                //     $adminname = stripslashes($adminname);
                //     $adminpassword = stripslashes($adminpassword);
                //     $adminname = $conn->real_escape_string($adminname);
                //     $adminpassword = $conn->real_escape_string($adminpassword);
                //
                //     $sql = "SELECT * FROM admin WHERE username='$adminname' AND password='$adminpassword'";
                //     $res = $conn->query($sql);
                //     $row = $res->fetch_assoc();
                //
                //     if ($adminname == $row['username'] && $adminpassword == $row['password'] ) {
                //         $_SESSION['lgn_adminname'] = $adminname;
                //         $_SESSION['lgn_adminpassword'] = $adminpassword;
                //         header("location: admin.php");
                //     } else {
                //         $error = '<div class="alert alert-danger" role="alert">Administrator Name, Password, or Code is invalid</div>';
                //     }
                // }
                // $conn->close();
            break;
            default:
                echo "HELLO default login.php";
            break;
        }
    }
?>
