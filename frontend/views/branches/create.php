<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Branches $model */

$this->title = 'Create Branches';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="branches-create">

    <?= $this->render('_form', [
        'model' => $model,
        'companies' => $companies
    ]) ?>

</div>
