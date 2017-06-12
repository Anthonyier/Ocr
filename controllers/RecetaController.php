<?php

namespace app\controllers;

use Yii;
use app\models\Receta;
use app\models\RecetaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RecetaController implements the CRUD actions for Receta model.
 */
class RecetaController extends Controller
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
     * Lists all Receta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecetaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionBuscar()
    { $model=new Receta();
        if($model->load(Yii::$app->request->post())) {
            $nombre=$model->nombre;
            $receta = Receta::findBySql("select * from receta WHERE nombre like '%$nombre%'")->one();
            return $this->redirect(['view','id'=>$receta->idrec]);
        }
        return $this->render('buscar',['model'=>$model]);
    }
    /**
     * Displays a single Receta model.
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
     * Creates a new Receta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receta();

        if ($model->load(Yii::$app->request->post()) ) {
            $nombreimg=$model->nombre;
            $model->file=UploadedFile::getInstance($model,'file');
            $model->file->saveAs( 'imagenes/'.$nombreimg.'.'.$model->file->extension);
            $model->imagen='imagenes/'.$nombreimg.'.'.$model->file->extension;
            $model->save();
            return $this->redirect(['view', 'id' => $model->idrec]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Receta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idrec]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Receta model.
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
     * Finds the Receta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Receta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Receta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
