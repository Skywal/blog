<?php


namespace site;

/**
 * Обробник помилок, що виникають на сайті
 * Class ErrorHandler
 * @package site
 */
class ErrorHandler
{

	/**
	 * ErrorHandler constructor.
	 */
	public function __construct() {
		if(DEBUG){
			error_reporting(-1); // показуємо всі помилки
		} else {
			error_reporting(0); // виключаємо протоколювання помилок
		}
		// всі виключення будуть проходити через даний клас
        // викликатиметься функція exeptionHandler кожен раз якщо буде генеруватися помилка
		set_exception_handler([$this, 'exeptionHandler']);
	}

	/**
	 * обробник помилок
	 * @param $exeption
	 */
	public function exeptionHandler($exeption){
		$this->logErrors($exeption->getMessage(), $exeption->getFile(), $exeption->getLine());
		$this->displayError('Exeption', $exeption->getMessage(), $exeption->getFile(), $exeption->getLine(),
			$exeption->getCode());
	}

	/**
	 * Запис помилок у файл
	 * @param string $message текст помилки
	 * @param string $file файл де сталася помилка
	 * @param string $line рядок де помилка
	 */
	protected function logErrors($message = '', $file = '', $line = ''){
		error_log("[". date('Y-m-d H:i:s') ."]
		 Error text: {$message}
		 File: {$file}
		 Line: {$line}
		 =============================================",
			3,
			ROOT . '/tmp/errors.log');
	}

	/**
	 * Показ помилок, якщо такі будуть
	 * @param $errNum
	 * @param $errStr текст помилки
	 * @param $errFile файл де сталася помилка
	 * @param $errLine рядок де помилка
	 * @param int $responce код помилки який відправляємо у браузер
	 */
	protected function displayError($errNum, $errStr, $errFile, $errLine, $responce = 404){
		http_response_code($responce);

		// демонструвати сторінку 404 якщо відповідна помилка і ми у режимі PRODUCTION
		if($responce == 404 && !DEBUG){
			require WWW . "/errors/404.php";
			//завершення скрипта
			die;
		}

		// якщо ми в режимі розробника то демонструватиметься відповідна сторінка
		if(DEBUG){
			require WWW . "/errors/dev.php";
		} else {
			require WWW . "/errors/prod.php";
		}

		die;
	}
}