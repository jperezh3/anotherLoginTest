<?php
	class Site{
		private static $TITLE="PHP Login Test";
		private static $VERSION="0.1";
		private static $AUTHOR="Jaime Alejandro Perez";

		//Put here values for MySQL conn
		private static $HOST="localhost";
		private static $DB="phplogintestdb";
		private static $USER="root";
		private static $PASS="";

		public static function printAuthor(){
			echo self::$AUTHOR;
		}

		public static function printTitle(){
			echo self::$TITLE;
		}


		public static function printSystemTitle() {
			 $title = self::$TITLE;
			 echo $title;
		}

		// -============================================-

		public static function returnMySQLHost(){
			return self::$HOST;
		}

		public static function returnDBName(){
			return self::$DB;
		}

		public static function returnDBUser(){
			return self::$USER;
		}

		public static function returnDBPassword(){
			return self::$PASS;
		}
	}
?>