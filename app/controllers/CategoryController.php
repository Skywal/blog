<?php


namespace app\controllers;


use app\models\Category;
use mysql_xdevapi\Exception;
use site\App;

class CategoryController extends AppController
{
    public function viewAction()
    {
        $alias = $this->route['alias'];
        $category = \R::findOne('articles_categories', 'alias = ?', [$alias]);
        if(!$category){
            throw new Exception("Page not found", 404);
        }

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids ? $category->id : $ids . $category->id;

        $articles_cat = \R::find('articles', "article_category IN ($ids)");
        $this->setMeta($category->title, $category->description, $category->keywords);

        beautifyText($articles_cat);

        $this->set(compact('articles_cat'));
    }
}