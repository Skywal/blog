<?php

// TODO: Comment this

namespace app\controllers;

use site\App;
use site\base\Controller;
use site\Cache;

class MainController extends AppController
{

	public function indexAction(){
        $articles = \R::findAll('articles', 'ORDER BY `pubdate`');

		$this->setMeta(App::$app->getProperty('site_name'),
			'Page description',
			'Page keywords');

		$this->beautifyText($articles);

		$this->set(compact('articles'));

	}

	public static function beautifyText($arr, $start = 0, $txtLength = 255, $endStr = ' ...'){
	    foreach ($arr as $elem){
	        $elem->text = substr($elem->text, $start, $txtLength) . $endStr;
        }
    }
}