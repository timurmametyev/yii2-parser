<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Parser;

class ParserController extends Controller {

    public function actionIndex() {

        $model = new Parser();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $parser = new Parser();
            $arr = $parser->getArray($model->path);
            $output = $parser->create($arr);
            return $this->render('index-confirm', ['output' => $output]);
        } else {
            return $this->render('index', ['model' => $model]);
        }
    }

}