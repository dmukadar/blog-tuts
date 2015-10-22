<head> 
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
</head>

<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use dosamigos\fileinput\FileInput;
use dosamigos\fileinput\BootstrapFileInput;
use app\models\Image;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
$data = [
		"red" => "red",
		"green" => "green",
		"blue" => "blue",
		"orange" => "orange",
		"white" => "white",
		"black" => "black",
		"purple" => "purple",
		"cyan" => "cyan",
		"teal" => "teal"
];

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','layout'=>'horizontal']]); ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
		    'editorOptions' => [
		        'preset' => 'full', 
		        'inline' => false, 
		    ],
		]);    
    ?>
    
    <?= $form->field($model, 'tags')->textInput(['maxlength' => true])?>
    
	<?= $form->field($model, 'file[]')->fileInput(['multiple'=>true]); ?>

	<?php 
		if($model->id){
			$image = Image::find()->where(['post_id'=>$model->id])->all();
			
			foreach ($image as $row){
				echo '<img src="'.Yii::$app->request->baseUrl.'/'.$row->path.'" width="90px">&nbsp ';
				echo Html::a('Delete Foto', ['post/foto_hps','id'=>$model->id,'id_image'=>$row->id],['class'=>'btn btn-danger']).'<p></br>';
			}
		}
	?>
    
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>