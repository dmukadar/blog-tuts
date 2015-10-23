<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use app\models\Image;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */

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

    <?php 
    	echo $form->field($model, 'tags')->widget(Select2::className(),[
		    'data' => $tagsList,
		    'options' => ['placeholder' => 'Select a color ...', 'multiple' => false],
		    'pluginOptions' => [
		        'tags' => true,
		        'maximumInputLength' => 10
		    ]
    	]);
    	
    ?>
    
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