<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Departments $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="departments-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',

            // 'company_id',
            'company.name',

            // 'branch_id',
            'branch.name',

            'name',

            [
                'attribute' => 'status',
                'value' => ucfirst($model->status)
            ],

            [
                'attribute' => 'created_at',
                'label' => 'Created Date',
                'value' => function($data) {
                    if ($data->created_at != '') {
                        return date("m-d-Y H:i:s", $data->created_at);
                    }

                    return null; // Or handle empty date gracefully
                }
            ],

        ],
    ]) ?>

</div>
