<?php

use backend\models\Branches;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\BranchesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="branches-index">

    <p>
        <?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',

            [
                'attribute' => 'company_id',
                'label' => 'Company',
                'value' => 'company.name'
            ],

            'name',

            [
                'attribute' => 'status',
                'value' => function($data) {
                    return ucfirst($data->status);
                }
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

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Branches $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
