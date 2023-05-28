<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

$this->title = 'Product Search';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="product-search">
    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($searchModel, 'title') ?>

    <?= $form->field($searchModel, 'status')->dropDownList([
        '1' => 'Active',
        '0' => 'Inactive'
    ], [
        'prompt' => 'Select a status'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="product-grid">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'title',
            'stock',
            'status'
        ],
    ]); ?>
</div>