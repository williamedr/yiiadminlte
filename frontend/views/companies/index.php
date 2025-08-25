<?php

use backend\models\Companies;
use yii\helpers\Html;
use yii\helpers\Url;

use kartik\grid\GridView;
use kartik\widgets\DateTimePicker;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var backend\models\CompaniesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $gridColumns = [
            ['class' => 'kartik\grid\SerialColumn'],

            // 'id',
            'name',
            'email:email',
            'address',

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
                },
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ];

    ?>


    <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'pjax' => true,
            'responsiveWrap' => false,
            'hover' => true,
            'striped' => false,
            'condensed' => false,
            'floatHeader' => true,
            'headerRowOptions' => ['class' => 'thead-light'],

            // 'rowOptions' => function($data) {
            //     return ['class' => ($data->status == 'active') ? 'success' : 'danger'];
            // },

            // 'panel' => [
            //     'before' => ' ', // Or add your toolbar content here
            // ],

            // 'toolbar' => [
            //     '{export}',
            //     '{toggleData}',
            // ],

            // 'export' => [
            //     'fontAwesome' => true,
            //     'target' => GridView::TARGET_SELF,
            //     'showConfirmAlert' => false,
            //     'exportConfig' => [
            //         GridView::CSV   => [],
            //         GridView::EXCEL => [],
            //         GridView::PDF   => [
            //             'config' => [
            //                 'methods' => [
            //                     'SetHeader'=>['Companies||Generated: ' . date("Y-m-d H:i")],
            //                     'SetFooter'=>['|Page {PAGENO}|'],
            //                 ]
            //             ]
            //         ],
            //     ],
            // ],

            'columns' => $gridColumns,
        ]);


        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns
        ]);
    ?>

</div>
