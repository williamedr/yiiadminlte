<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Companies $model */

$this->title = 'Create Companies';
$this->params['breadcrumbs'][] = ['label' => 'Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="companies-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
