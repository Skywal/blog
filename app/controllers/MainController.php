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

	protected function beautifyText($arr, $txtLength = 255){
	    foreach ($arr as $elem){
	        $elem->text = substr($elem->text, 0, $txtLength) . ' ...';
        }
    }
}