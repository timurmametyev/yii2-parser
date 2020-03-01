<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Category;

class CategoryController extends Controller {

    public function actionIndex() {
        $categories = Category::find()->all();
        return $this->render('all', ['categories' => $categories]);
    }

    public function actionView($id) {
        $temp = new Category();
        $books = $temp->getCategoryBooks($id);
        $category = $temp->getCategory($id);
        return $this->render('one', ['category' => $category, 'books' => $books]);
    }

}