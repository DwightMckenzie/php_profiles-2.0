<?php
    class Account {

		private $conn;
		private $errorArray = array();
		private $noticeArray = array();

		public function __construct($conn) {
			$this->conn = $conn;
		}
        
        // login for regular user
        public function userLogin($un, $pw) {
            // if field empty
            if (empty($un) || empty($pw)) {
                array_push($this->errorArray, Constants::$fieldEmpty);
            } else {

                // $pw = hash("sha512", $pw);
                $pw = hash("md5", $pw);

                $sql = "SELECT * FROM user_prof
                        WHERE username=:un
                        AND password=:pw";
                $query = $this->conn->prepare($sql);
                $query->bindValue(':un', $un);
                $query->bindValue(':pw', $pw);
                $query->execute();

                // see if the username exists
                if($query->rowCount() == 1) {
                    return true;
                }

                // if mathc don't match
                array_push($this->errorArray, Constants::$loginFailed);
                return false;

            }
        }

        // login for admin user
        public function adminLogin($un, $pw, $pin) {
            // if field empty
            if (empty($un) || empty($pw) || empty($pin)) {
                array_push($this->errorArray, Constants::$fieldEmpty);
            } else {

                // $pw = hash("sha512", $pw);
                $pw = hash("md5", $pw);

                $sql = "SELECT * FROM admin_prof
                        WHERE username=:un
                        AND password=:pw
                        AND pin=:pin";
                $query = $this->conn->prepare($sql);
                $query->bindValue(':un', $un);
                $query->bindValue(':pw', $pw);
                $query->bindValue(':pin', $pin);
                $query->execute();

                // see if the username exists
                if($query->rowCount() == 1) {
                    return true;
                }

                // if mathc don't match
                array_push($this->errorArray, Constants::$loginFailed);
                return false;

            }

            /** 
             * Keep the this for coparision of OOP and MYSEQLI setups,
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
            */
        }

        // user register
        public function register($em, $pw) {
            // if (empty($_POST['regname']) || empty($_POST['regemail'])) {
            // 		$error = '<div class="alert alert-warning" role="alert">Please fill in Usernmae or Email under Register tab.</div>';
            // } else {
            // 		echo "going through ";

            // 		////////////////////////////////////////////////////////////////////////////////////////////////
            // 		// 1 insert new user name and Email to database
            // 		// 2 have function generate temp Password
            // 		// 3 after temp password generated email is sent to new user to use and login in to their account
            // 		/////////////////////////////////////////////////////////////////////////////////////////////////

            // 		if(isset($_POST['regemail'])) {
            // 				$regEmail = $_POST['regemail'];
            // 				$regName = $_POST['regname'];
            // 				$regPassword = '';

            // 				// $regName = $_POST['regname'];
            // 				// $regEmail = $_POST['regemail'];

            // 				// EDIT THE 2 LINES BELOW AS REQUIRED
            // 				$email_to = $regEmail;
            // 				$email_subject = "Your password";

            // 				function died($error) {
            // 						// your error code can go here
            // 						echo "We are very sorry, but there were error(s) found with the form you submitted. ";
            // 						echo "These errors appear below.<br /><br />";
            // 						echo $error."<br /><br />";
            // 						echo "Please go back and fix these errors.<br /><br />";
            // 						die();
            // 				}

            // 				// validation expected data exists
            // 				// if( !isset($regName) || !isset($regEmail)) {
            // 				//     died('We are sorry, but there appears to be a problem with the form you submitted.');
            // 				// }

            // 				// echo "" . $regName . "";

            // 				// $sql = "INSERT INTO profiles (firstname,lastname,email,username,password) VALUES ('{$firstname}','{$lastname}','{$regEmail}','{$regName}','{$password}')";
            // 				$sql = "INSERT INTO profiles (email,username,password) VALUES ('{$regEmail}','{$regName}','{$regPassword}')";
            // 				$res = $conn->query($sql);

            // 				// if (mysqli_query($conn, $sql)) {
            // 				if ($res) {
            // 						echo "<p>Profile successfully added</p>";
            // 				} else {
            // 						// echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            // 						echo "Error: " . $sql . "<br>" . $conn->error;
            // 				}

            // 				$conn->close();
                    // }
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
            // }
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
        }

		// for bootstrap notices
		public function getErrorBS($error) {
			if(in_array($error, $this->errorArray)) {
				return '<div class="alert alert-warning" role="alert">' . $error . '</div>';
			}
		}

    }


// $conn = new mysqli('localhost','Dwight1980','ABC123%','profile_db');

    // if (!$conn) {
    //     die("Connection failed: " . $conn->connect_error());
    // }

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
