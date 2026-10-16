<?php

  /**
   * 
   * 
   * 
   * 
   * 
   * 
   */
  class Session {
    // public $conn, $sqlData;
    
    // start a session
    public static function startSession() {
      if (session_status() === PHP_SESSION_NONE) {
        session_start();
      }
    }


    /**
     * set a session variable
     * 
     * @param string $key = session label
     * @param string $value = session value
     * 
     */
    public static function set($key, $value) {
      $_SESSION[$key] = $value;
    }


    /**
     * get a session variable
     * 
     * @param string $key = session label
     * 
     */
    public static function get($key) {
      return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }


    /**
     * see if user is logged in
     * 
     * @param bool $value = pass true or false
     * 
     */
    public static function userLoggedIn($value) {
      if(!isset($value)) {
        header("Location: login.php");
        exit();
      }
      
      return $value;

    }


    /** ???
     * Check if a session variable exists
     * 
     * @param string #key = username
     * 
     */
    public static function has($key) {
      return isset($_SESSION[$key]);
    }


    /** ???
     * Remove a session variables
     * 
     * @param string $key = current session
     * 
     * if $this->has string username 
     *  
     */
    public static function remove($key) {
      if ($this->has($key)) {
        unset($_SESSION[$key]);
      }
    }


    /**
     * destroy a whole session
     * 
     */
    public static function destroySession() {
		// if (session_status() === PHP_SESSION_ACTIVE) {

			// session_unset(); 
			// session_destroy();

			// echo '<script>
			// // Clear browser session storage
			// sessionStorage.clear();
			// console.log("Session storage cleared.");
			// </script>';

			// // header("Location: confirmation.php?action=account-logout");
			// header("Location: ../../../index.php");

			// // exit();
		// }
		
		echo '<script>
			sessionStorage.clear();
			localStorage.clear();
			window.location.href = "../../index.php";
		</script>';
		exit;
		
    }
    
  }


  // Examples of usage: ====================
  // Create new Object = Start, session
  // $session = new Session();
  // $session->startSession();

  // Set session variables = pass key, value
  // $session->set('username', 'JohnDoe');
  // $session->set('role', 'admin');

  // Retrieve session variables = Render to page
  // echo 'Username: ' . $session->get('username') . '<br>';
  // echo 'Role: ' . $session->get('role') . '<br>';

  // Remove a session variable
  // $session->remove('role');

  // Destroy the session
  // $session->destroySession();
?>