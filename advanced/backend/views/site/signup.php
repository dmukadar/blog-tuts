<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Personal</b>BLOG</a>
    </div>
    <div class="register-box-body">
        <p class="login-box-msg">Pendaftaran Keanggotaan</p>
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username', [
                    'options' => [
                        'tag'=>'div',
                        'class'=>'form-group has-feedback'
                    ],
                    'inputOptions' => [
                        'placeholder' => 'username',
                        'autofocus' => 'autofocus',
                        'required' => 'required'
                    ],
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-user form-control-feedback"></span>',
                    'template' => '{label}{input}{hint}{error}'
                ])->label(false); ?>
        
            <?= $form->field($model, 'email', [
                    'options' => [
                        'tag'=>'div',
                        'class'=>'form-group has-feedback'
                    ],
                    'inputOptions' => [
                        'placeholder' => 'email',
                        'type' => 'email',
                        'required' => 'required'
                    ],
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-envelope form-control-feedback"></span>',
                    'template' => '{label}{input}{hint}{error}'
                ])->label(false); ?>
        
        
            <?= $form->field($model, 'password', [
                    'options' => [
                        'tag'=>'div',
                        'class'=>'form-group has-feedback'
                    ],
                    'inputOptions' => [
                        'placeholder' => 'password',
                        'type' => 'password',
                        'required' => 'required'
                    ],
                    'inputTemplate' => '{input}<span class="glyphicon glyphicon-lock form-control-feedback"></span>',
                    'template' => '{label}{input}{hint}{error}'
                ])->passwordInput()->label(false); ?>
        <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Daftar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'signup-button', 'value' => 'Daftar'] ) ?>
            </div>
          </div>
       
        <?php ActiveForm::end(); ?>
    </div>
</div>