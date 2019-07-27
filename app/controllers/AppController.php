<?php
/// Проміжний контролер з спільними для всіх інших контролерів функціями
/// в контроллерах наслідниках буде доступний не тільки код з базового контролеру
/// а і той код що тут напишемо

namespace app\controllers;

use app\models\AppModel;
use site\App;
use site\base\Controller;
use site\Cache;

class AppController extends Controller {

	public function __construct($route) {
		parent::__construct($route);

		new AppModel();
		App::$app->setProperty('cats', self::cacheCategory());
	}

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM articles_categories");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}