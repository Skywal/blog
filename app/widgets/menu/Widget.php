<?php


namespace app\widgets\menu;


abstract class Widget
{
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl;
    protected $container;
    protected $class;
    protected $table;
    protected $cache = 3600;
    protected $cacheKey;
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = []){
        $this->tpl = __DIR__ . '/menu_tpl/menu.php';
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected abstract function run();
    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach($this->attrs as $k => $v){
                $attrs .= " $k='$v' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
        echo $this->prepend;
        echo $this->menuHtml;
        echo "</{$this->container}>";
    }
    protected abstract function getTree();
    protected abstract function getWidgetHtml($tree, $tab);
    protected abstract function conToTemplate($content, $tab, $id);
}