<?php

namespace app\controllers;

use Yii;
use app\models\Historialclinico;
use app\models\HistorialclinicoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * HistorialclinicoController implements the CRUD actions for Historialclinico model.
 */
class HistorialclinicoController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Historialclinico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HistorialclinicoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Historialclinico model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

   public function actionBuscar()
   { $model=new Historialclinico();
       if($model->load(Yii::$app->request->post())) {
           $nombre=$model->nombre;
           $historialclinico = Historialclinico::findBySql("select * from historialclinico WHERE nombre like '%$nombre%'")->one();
           return $this->redirect(['view','id'=>$historialclinico->id]);
       }
        return $this->render('buscar',['model'=>$model]);
   }
    /**
     * Creates a new Historialclinico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Historialclinico();

        if ($model->load(Yii::$app->request->post())) {
            $nombreimg=$model->nombre;
            $model->file=UploadedFile::getInstance($model,'file');
            $model->file->saveAs( 'imagenes/'.$nombreimg.'.'.$model->file->extension);
            $model->imagen='imagenes/'.$nombreimg.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Historialclinico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Historialclinico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Historialclinico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Historialclinico the loaded model
     * @throws NotFoundHttpExceptiron if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Historialclinico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
