<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="product-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxLength' => true]) ?>

    <?= $form->field($model, 'stock')->textInput(['type' => 'number', 'step' => 1]) ?>

    <?= $form->field($model, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'Inactive'
    ], [
        'prompt' => 'Select a status'
    ])

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>