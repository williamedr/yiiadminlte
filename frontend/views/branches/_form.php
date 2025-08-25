<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use backend\models\Companies;

/** @var yii\web\View $this */
/** @var backend\models\Branches $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        echo $form->field($model, 'company_id')->widget(Select2::classname(), [
            // 'language' => 'en',
            'data' => ArrayHelper::map($companies, 'id', 'name'),
            'options' => ['placeholder' => 'Select Company'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ])->label('Company');
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
