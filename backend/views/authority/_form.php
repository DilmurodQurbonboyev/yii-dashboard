<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Authority */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="authority-form">
    <div class="card card-primary card-outline card-tabs">
        <div class="card-body">
            <div class="card-header p-0 pt-1 border-bottom-0">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="lang-oz" data-toggle="pill" href="#oz" role="tab"
                           aria-controls="oz" aria-selected="true">O‘zb</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lang-uz" data-toggle="pill" href="#uz" role="tab" aria-controls="uz"
                           aria-selected="false">Ўзб</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lang-ru" data-toggle="pill" href="#ru" role="tab" aria-controls="ru"
                           aria-selected="false">Рус</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="lang-en" data-toggle="pill" href="#en" role="tab" aria-controls="en"
                           aria-selected="false">Eng</a>
                    </li>
                </ul>
            </div>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'status')->textInput() ?>

            <input type="hidden" name="_token" value="pPBrj15BFP0MmqpaUOhYWxXnQrdG6PWUm3QhvDWA">
            <div class="tab-content my-tab-content">
                <div class="tab-pane fade show active" id="oz" role="tabpanel" aria-labelledby="oz">
                    <div class="form-group">
                        <label for="title_oz" class="">
                            Title
                        </label>
                        <input type="text" name="title_oz" class="form-control " id="title_oz" value="">
                    </div>
                </div>
                <div class="tab-pane fade show" id="uz" role="tabpanel" aria-labelledby="uz">
                    <div class="form-group">
                        <label for="title_uz" class="">
                            Title
                        </label>
                        <input type="text" name="title_uz" class="form-control " id="title_uz" value="">
                    </div>
                </div>
                <div class="tab-pane fade show" id="ru" role="tabpanel" aria-labelledby="ru">
                    <div class="form-group">
                        <label for="title_ru" class="">
                            Title
                        </label>
                        <input type="text" name="title_ru" class="form-control " id="title_ru" value="">
                    </div>
                </div>
                <div class="tab-pane fade show" id="en" role="tabpanel" aria-labelledby="en">
                    <div class="form-group">
                        <label for="title_en" class="">
                            Title
                        </label>
                        <input type="text" name="title_en" class="form-control " id="title_en" value="">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <?= $form->field($model, 'status')->widget(Select2::class, [
                    'data' => $data,
                    'options' => ['placeholder' => Yii::t('app', 'Select status')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>
            </div>
            <div class="form-group">
                <a class="btn btn-danger" href="<?= Url::to(['authority']) ?>">
                    <i class="fa fa-angle-double-left"></i>
                    <?= Yii::t('app', 'Back') ?>
                </a>
                <button type="reset" class="btn btn-warning">
                    <i class="fas fa-sync-alt"></i>
                    <?= Yii::t('app', 'Clear All') ?>
                </button>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Add'), ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
