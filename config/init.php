<?php
/**
 * Фалй конфігурацій проекту
 * Константи
 */


// в якому режимі працюємо на сайті
// 1 - режим розробки: показуємо всі помилки
// 0 - режим продакшина: помилки не показуємо але логуємо
define("DEBUG", 1);

//показує на корінь проекту
define("ROOT", dirname(__DIR__));

//показує в корінь сайту
define("WWW", ROOT . '/public');
//папка де лежать контролери, моделі і тд
define("APP", ROOT . '/app');

/**
 * ядро
 */
define("CORE", ROOT . '/vendor/site/core');
define("LIBS", ROOT . '/vendor/site/core/libs');

define("CACHE", ROOT . '/tmp/cache');
define("CONFIG", ROOT . '/config');

//шаблон сайту за замовчуванням
define("LAYOUT", 'blog');

/**
 * головний URL сайту
 */
//http://site/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://site/public/
$app_path = preg_replace("#[^/]+$#",'', $app_path);
//http://site
$app_path = str_replace('/public/', '', $app_path);
define("PATH", $app_path);

//шлях до адмінки сайту
define("ADMIN", $app_path . '/admin');

//підключення composer до проекту
require_once ROOT . '/vendor/autoload.php';
