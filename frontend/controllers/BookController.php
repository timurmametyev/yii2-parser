<?php

namespace frontend\controllers;

use Yii;
use common\models\Book;
use common\models\Category;
use yii\web\Controller;

class BookController extends Controller {

    public function actionView($id) {
        $book = Book::findOne($id);
        $category = Category::getCategory($book->category_id);
        $similar = Book::find()->where(['category_id' => $category->id])->andWhere(['not', ['id' => $book->id]])->limit(12)->all();
        return $this->render('view', ['book' => $book, 'category' => $category, 'similar' => $similar]);
    }

}