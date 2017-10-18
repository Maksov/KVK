<?php

namespace app\controllers;

use app\models\Karta;
use app\models\Organization;
use app\models\Reestr;
use app\models\ReestrOperation;
use Codeception\Module\Yii2;
use Yii;
use app\models\Operation;
use app\models\OperationSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use unclead\multipleinput\examples\actions\TabularInputAction;

/**
 * OperationController implements the CRUD actions for Operation model.
 */
class OperationController extends Controller
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

    public function actions()
    {
        return [

            // объявляет "view" действие с помощью конфигурационного массива
            'tabularinput' => [
                'class' => TabularInputAction::className(),

            ],
        ];
    }

    /**
     * Lists all Operation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OperationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Operation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $query = $this->findModel($id);

        // add conditions that should always apply here


       $riskProvider = new ActiveDataProvider([
           'query' => $query->getReestrs(),
        ]);

        $kartaProvider = new ActiveDataProvider([
            'query' => $query->getKartas(),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'riskProvider'=>$riskProvider,
            'kartaProvider'=>$kartaProvider,
        ]);
    }

    /**
     * Creates a new Operation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $modelOperation = new Operation();
        /*
        foreach (Organization::find()->all() as $org) {
            $modelKarta[$org->sono]=new Karta();
            $modelKarta[$org->sono]->id_organization = $org->id;
        }

        if(Yii::$app->request->isPost){

            if ($modelOperation->load(Yii::$app->request->post())) {
                //return $this->redirect(['view', 'id' => $model->id]);
                print_r($modelOperation);
                Model::loadMultiple($modelKarta, Yii::$app->request->post());
                print_r($modelKarta);
            } else {

                echo 'sdsdsdsd';

            }





        } else {
            return $this->render('create', [
                'modelOperation' => $modelOperation,
                'modelKarta' => $modelKarta,
            ]);
        }

    //    print_r($modelKarta);

*/
        if ($modelOperation->load(Yii::$app->request->post()) && $modelOperation->save()) {
           return $this->redirect(['view', 'id' => $modelOperation->id]);
        } else {
                return $this->render('create', [
                'modelOperation' => $modelOperation,
            ]);
        }
    }

    public function actionRisk()
    {
        $operation = new Operation();

        $modelRisks=[new ReestrOperation()];

        $formRisks = Yii::$app->request->post('ReestrOperation', []);
        foreach ($formRisks as $i => $formRisk) {
            $modelRisk = new ReestrOperation();
            $modelRisk->setAttributes($formRisk);
            $modelRisks[] = $modelRisk;
        }

        if($operation->load(Yii::$app->request->post())) {


            }


        else return $this->render('OperationRisk', [
                'operation' => $operation,
                'risk' => $modelRisks,
            ]);


    }

    /**
     * Updates an existing Operation model.
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
     * Deletes an existing Operation model.
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
     * Finds the Operation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Operation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Operation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
