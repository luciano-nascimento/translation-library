<?php

class Translator{

	const DICTIONARY = 'Dictionary.php';
	private static $mainInstance;
	private $lang;
	private $dictionary;

	private function __construct(){

		$this->devMode(true);
		
		if(file_exists(self::DICTIONARY)){
			$this->dictionary = include 'Dictionary.php';
		}
		
	}

	public static function getMainInstance(){
		if(empty(self::$mainInstance)){
				self::$mainInstance = new Translator;
		}

		return self::$mainInstance;
	}

	public static function setLanguage($lang)
	{
		$instance = self::getMainInstance();
		$instance->lang = $lang;
	}

	public static function getLanguage(){
		$instance = self::getMainInstance();
		return $instance->lang;
	}

	public static function translate($word)
	{
		$instance = self::getMainInstance();
		

		if($instance->dictionary != '' && $instance->dictionary != null){
			$key = array_search($word, $instance->dictionary['en']);

			$language = self::getLanguage();
			return $instance->dictionary[$language][$key];
		}
		else{
			return false;
		}
		
	}

	private function devMode($status){
		
		$success = false;

		if($status){
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			$success = true;
		}

		return $success;
	}

}


?>