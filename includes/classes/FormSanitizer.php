<?php
	
  /**
   * clean the input field values
   * 
   * 
   */
  class FormSanitizer {

		public static function sanitizeFormString($inputText) {
			$inputText = strip_tags($inputText);
			$inputText = str_replace(" ", "", $inputText);
			//$inputText = trim($inputText);
			$inputText = strtolower($inputText);
			$inputText = ucfirst($inputText);
			return $inputText;
		}

		public static function sanitizeFormDisplayName($inputText) {
			$inputText = strip_tags($inputText);
			$inputText = str_replace(" ", "", $inputText);
			return $inputText;
		}

		public static function sanitizeFormUsername($inputText) {
			$inputText = strip_tags($inputText);
			$inputText = str_replace(" ", "", $inputText);
			return $inputText;
		}

		public static function sanitizeFormPassword($inputText) {
			$inputText = strip_tags($inputText);
			return $inputText;
		}

		public static function sanitizeFormPin($inputText) {
			$inputText = strip_tags($inputText);
			return $inputText;
		}

		public static function sanitizeFormEmail($inputText) {
			$inputText = strip_tags($inputText);
			$inputText = str_replace(" ", "", $inputText);
			return $inputText;
		}

	}

?>