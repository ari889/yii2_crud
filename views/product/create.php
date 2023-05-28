<?php

use yii\helpers\Html;

$this->title = "Create Product";
$this->params['breadcrumbs'][] = ['label' => 'Product CRUD', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model
]) ?>