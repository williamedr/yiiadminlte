<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Departments $model */

$this->title = 'Create Departments';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="departments-create">

    <?= $this->render('_form', [
        'model' => $model,
        'type' => 'create',
        'companies' => $companies,
        'branches' => $branches
    ]) ?>

</div>
