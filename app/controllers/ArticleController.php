<?php


namespace app\controllers;


class ArticleController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $article = \R::findOne('articles', 'alias = ?', [$alias]);

        debug($article);
    }
}