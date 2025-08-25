<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'company_id')->widget(Select2::classname(), [
            // 'language' => 'en',
            'data' => ArrayHelper::map($companies, 'id', 'name'),
            'options' => ['id' => 'company_id', 'placeholder' => 'Select Company'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Company');


        $params = [];

        if ($type == 'update') {
            echo $form->field($model, 'branch_id')->hiddenInput(['value' => $model->branch_id, 'id' => 'branch_id'])->label(false);
            $params[] = 'branch_id';
        }

        echo $form->field($model, 'branch_id')->widget(DepDrop::classname(), [
            'options'=>['id' => '_branch_id'],
            'pluginOptions' => [
                'depends' => ['company_id'],
                'initialize' => true,
                'placeholder' => 'Select Branch',
                'url' => Url::to(['/companies/branches']),
                'params' => $params
            ]
        ])->label('Branch');
    ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [ 'active' => 'Active', 'inactive' => 'Inactive', ],
        ['prompt' => '']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Back', 'index', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
