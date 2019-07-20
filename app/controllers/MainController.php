<?php

// TODO: Comment this

namespace app\controllers;

use site\App;
use site\base\Controller;
use site\Cache;

class MainController extends AppController
{

	public function indexAction(){

		$this->setMeta(App::$app->getProperty('site_name'),
			'Page description',
			'Page keywords');
	}
}