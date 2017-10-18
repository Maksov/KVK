<?php

namespace app\controllers;

use kartik\form\ActiveForm;
use Yii;
use app\models\Karta;
use app\models\KartaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * KartaController implements the CRUD actions for Karta model.
 */
class KartaController extends Controller
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
     * Lists all Karta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KartaSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$query=Karta::find()->joinWith('Reestr');

        //print_r($query);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Karta model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Karta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Karta();

        if (Yii::$app->request->isAjax) {
        if($model->load(Yii::$app->request->post())&& $model->save()) {
                return '1';
            } else
                if(Yii::$app->request->isPost) $model->id_operation=Yii::$app->request->post('idoper');
                return $this->renderAjax('create', [
            'model' => $model,
        ]);

        }



/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            if(Yii::$app->request->isAjax) {
                return $this->renderAjax('create', [
                    'model' => $model,
                ]);
            }
            else {
                return $this->render('create', [
                'model' => $model,
            ]); }
        }
*/
    }

    /**
     * Updates an existing Karta model.
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
     * Deletes an existing Karta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }


    public function actionValidation () {

        $model = new Karta();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {

                Yii::$app->response->format = 'json';
                return ActiveForm::validate($model);

            } else {

            }
    }
    /**
     * Finds the Karta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Karta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Karta::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
