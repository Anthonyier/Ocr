<?php

namespace app\controllers;

use Yii;
use app\models\Diagnostico;
use app\models\DiagnosticoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * DiagnosticoController implements the CRUD actions for Diagnostico model.
 */
class DiagnosticoController extends Controller
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
     * Lists all Diagnostico models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diagnostico model.
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
    { $model=new Diagnostico();
        if($model->load(Yii::$app->request->post())) {
            $nombre=$model->nombre;
            $diagnostico = Diagnostico::findBySql("select * from diagnostico WHERE nombre like '%$nombre%'")->one();
            return $this->redirect(['view','id'=>$diagnostico->iddiag]);
        }
        return $this->render('buscar',['model'=>$model]);
    }
    /**
     * Creates a new Diagnostico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diagnostico();

        if ($model->load(Yii::$app->request->post())) {
            $nombreimg=$model->nombre;
            $model->file=UploadedFile::getInstance($model,'file');
            $model->file->saveAs( 'imagenes/'.$nombreimg.'.'.$model->file->extension);
            $model->imagen='imagenes/'.$nombreimg.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->iddiag]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Diagnostico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->iddiag]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Diagnostico model.
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
     * Finds the Diagnostico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diagnostico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diagnostico::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
