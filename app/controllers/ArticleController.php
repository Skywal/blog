<?php


namespace app\controllers;


use mysql_xdevapi\Exception;

class ArticleController extends AppController
{
    public function viewAction(){
        $alias = $this->route['alias'];
        $article = \R::findOne('articles', 'alias = ?', [$alias]);

        if(!$article){
            throw new Exception('Page not found', 404);
        }

        // галерея

        // коментарі

        $this->setMeta($article->title);
        $this->set(compact('article'));
    }
}