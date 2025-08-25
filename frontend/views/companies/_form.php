<?php

use yii\helpers\Html;

use kartik\form\ActiveForm;
use kartik\form\ActiveField;
use kartik\widgets\DateTimePicker;
use kartik\widgets\SwitchInput;
use yii\web\JsExpression;


/** @var yii\web\View $this */
/** @var backend\models\Companies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="companies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <?php
        // echo '<label class="control-label">Status</label>';
        // echo SwitchInput::widget([
        //     'name' => 'status',
        //     'value' => $model->status,
        //     'pluginOptions'=>[
        //         'handleWidth' => 60,
        //         'onText' => 'Active',
        //         'offText' => 'Inactive'
        //     ],

        //     'pluginEvents' => [
        //         // The 'switchChange.bootstrapSwitch' event is triggered when the switch state changes.
        //         // 'item' in the function refers to the jQuery element of the switch.
        //         "switchChange.bootstrapSwitch" => new JsExpression("function(event, state) {
        //             $(event.target).val(state ? 'active' : 'inactive');
        //             console.log($(event.target).val());
        //         }"),
        //     ],
        // ]);
    ?>

    <?php // echo $form->field($model, 'created_at')->input('date')->label('Created Date') ?>

    <div class="form-group mt-4">
        <?= Html::a('Back', 'index', ['class' => 'btn btn-info']) ?>
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
