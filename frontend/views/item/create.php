<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Item */

$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h4>Revaldo Putra</h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>