<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Parser';
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'path') ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>