<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Companies $model */

$this->title = 'Update Companies: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="companies-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
