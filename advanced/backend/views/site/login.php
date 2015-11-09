<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Personal</b>BLOG</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Silakan masuk untuk memulai sesi anda</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'username'])->label(false); ?> 
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'password'])->label(false); ?>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">   
                  <label>
                  <input type="checkbox" name="LoginForm[rememberMe]" value="1"> Ingat Saya
                  </label>             
                  <?php //= $form->field($model, 'rememberMe')->checkbox(['label' => 'Ingat saya']); ?>                
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div><!-- /.col -->
          </div>
        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
        </div><!-- /.social-auth-links -->

        <a href="#">Lupa kata kunci</a><br>
        <a href="?r=site/signup" class="text-center">Pendaftaran anggota</a>

      </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!--
    <?= $form->field($model, 'rememberMe')->checkbox() ?>
-->