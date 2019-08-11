<?php

//TODO: Rebuild this
namespace app\widgets\recentPosts;


use app\widgets\menu\Widget;
use site\App;
use site\Cache;

class RecentPosts extends Widget
{
    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    protected function run()
    {
        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('arts');
            if(!$this->data){
                $this->data = $arts = \R::getAssoc("SELECT title, alias FROM {$this->table} ORDER BY id DESC LIMIT 5");
            }

            $this->menuHtml = $this->getWidgetHtml($this->data, '');

            if($this->cache){
                $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

//    protected function output(){
//
//    }
//
    protected function getTree(){
    }

    protected function getWidgetHtml($tree, $tab){
        $str = '';
        foreach($tree as $title=>$alias){
            $str .= $this->conToTemplate($title, $tab, $alias);
        }
        return $str;
    }

    protected function conToTemplate($title, $tab, $alias){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}