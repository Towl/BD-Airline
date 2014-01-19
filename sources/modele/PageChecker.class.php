<?php
abstract class PageChecker {
	public static function linkIsCurrent($link){
		$page = self::currentPage();
		$pageLink = substr($link,strrpos($link,"/")+1);
		return $page == $pageLink;
	}
	
	private static function currentPage(){
		return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
}
?>