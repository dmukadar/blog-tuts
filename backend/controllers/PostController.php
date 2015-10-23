<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Image;
use app\models\Tag;
use yii\helpers\ArrayHelper;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$imageDir = \Yii::$app->params['imageDirectory'];
        $model = new Post();
        
        if ($model->load(Yii::$app->request->post())) {
        	$imageCaption = $model->title;
        	$file2 = UploadedFile::getInstances($model, 'file');
        	
        	foreach ($file2 as $fileImage)
        	{
        		$model->save();
        		$pathType = $imageDir.$model->id.'/'.$imageCaption;
        		$path = $pathType.'/'.$fileImage->name;
        		
        		$imageClass = new Image();
        		$imageClass->createRecordImage($imageCaption,$path,$model->id);
        		$imageClass->createFolder($pathType, $path);
        		
        		$fileImage->saveAs($path);
        	}
        	$model->save();
        	
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
        	$tag = Tag::findTags();
        	$tagsList = ArrayHelper::map($tag, 'id', 'name');
            return $this->render('create', [
                'model' => $model,
            	'tagsList' => $tagsList
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	$imageDir = \Yii::$app->params['imageDirectory'];
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

        	$imageCaption = $model->title;
        	
        	$file2 = UploadedFile::getInstances($model, 'file');

        	foreach ($file2 as $fileImage)
        	{        		
        		$model->save();
        		$pathType = $imageDir.$model->id.'/'.$imageCaption;
        		$path = $pathType.'/'.$fileImage->name;
        		
        		$imageClass = new Image();
        		$imageClass->createRecordImage($imageCaption,$path,$model->id);
        		$imageClass->createFolder($pathType, $path);
        		
        		$fileImage->saveAs($path);
        	}
        	
        	$model->save();
        	
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
        	$tag = Tag::findTags();
        	$tagsList = ArrayHelper::map($tag, 'id', 'name');
            return $this->render('create', [
                'model' => $model,
            	'tagsList' => $tagsList
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$imageRecord = Image::find()->where('post_id = '.$id)->all();
    	foreach ($imageRecord as $row){
    		$row->delete();
    	}
    	
    	$model = new Post();
    	$model->minusFrequencyTag($id);
    	
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionFoto_hps($id,$id_image){
    	$foto = Image::find()->where(['id'=>$id_image])->one()->path;
    	if($foto){
    		if(!unlink($foto)){
    			return false;
    		}
    	}
    	 
    	$imageRecord = Image::findOne($id_image);
    	$imageRecord->delete();
    	 
    	return $this->redirect(['update', 'id' => $id]);
    }
}
