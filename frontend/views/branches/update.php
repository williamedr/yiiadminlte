<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Branches $model */

$this->title = 'Update Branches: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branches-update">

    <?= $this->render('_form', [
        'model' => $model,
        'companies' => $companies
    ]) ?>

</div>
