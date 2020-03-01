<?php

namespace frontend\components;

use \yii\base\Widget;
use common\models\Category;

class MenuWidget extends Widget {

    public $data;
    public $tree;
    public $code;

    public function run() {
        $this->data = Category::find()->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->code = $this->getMenu($this->tree);
        return $this->code;
    }

    protected function getTree() {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent']) {
                $tree[$id] = &$node;
            } else {
                $this->data[$node['parent']]['children'][$node['id']] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenu($tree) {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->toTemplate($category);
        }
        return $str;
    }

    protected function toTemplate($category) {
        ob_start();
        include __DIR__ . '/menu/menu.php';
        return ob_get_clean();
    }

}