<?php
abstract class LineManager{
	public static $currentTabulation = 0;
	
	public static function carriageReturnEqual(){
		echo "\n";
		self::tab();
	}
	
	private static function tab(){
		for($i=0; $i<self::$currentTabulation; $i++){
			echo "  ";
		}
	}
	
	public static function carriageReturnMore(){
		echo "\n";
		self::incrementTab();
		self::tab();
	}
	
	private static function incrementTab(){
		self::$currentTabulation = self::$currentTabulation + 1;
	}
	
	public static function carriageReturnLess(){
		echo "\n";
		self::decrementTab();
		self::tab();
	}
	
	private static function decrementTab(){
		self::$currentTabulation = self::$currentTabulation - 1;
	}
}
?>