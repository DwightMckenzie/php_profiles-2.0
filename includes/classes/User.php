<?php
  /**
   * get the user variables
   * 
   */

	class User {
		/**
		 * return primary user variables
		 * 
		 * selected by username
		 * 
		 * @param string $conn = database connection
		 * @param string $username = current user username
		 * 
		 * 
		 */
		public static function userVariables($conn, $un) {			
			$sql = "SELECT * FROM user_prof
            	WHERE username=:un";
			$query = $conn->prepare($sql);
			$query->bindValue(":un", $un);
			$query->execute();

			$sqlData = $query->fetch(PDO::FETCH_ASSOC);

			return $sqlData;
		}

		// /**
		//  * return user meta variables
		//  * 
		//  * selected by user id provided from userVariables
		//  * 
		//  * @param string $conn = database connection
		//  * @param string $user_id = current user primary id 
		//  * 
		//  */
		// public static function userMetaVariables($conn, $user_id) {
		// 	$sql = "SELECT * FROM user_meta
    //         	WHERE user_id=:user_id";
		// 	$query = $conn->prepare($sql);
		// 	$query->bindValue(":user_id", $user_id);
		// 	$query->execute();

		// 	// $sqlData = $query->fetchAll(PDO::FETCH_ASSOC);

		// 	$data = [];

		// 	if ($query) {
		// 		while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
		// 			$data[] = $row; // Add each user to the array
		// 		}
		// 	}

		// 	// return $row;
		// 	// return $sqlData;
		// 	return $data;
		// }

	}

?>