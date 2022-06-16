<?php

namespace backend\controllers;

use app\components\MyComponent;
use app\components\StatisticComponent;
use backend\models\Item;
use backend\models\ItemSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ItemController implements the CRUD actions for Item model.
 */
class ItemController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Item models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Yii::$app->myComponents->trigger(MyComponent::ON_SAVE_STAT);
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        // $this->createStatistic();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Item();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function update()
    {
        $model = new Item();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function delete()
    {
        $model = new Item();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('delete', [
            'model' => $model,
        ]);
    }

    public function transaction()
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollBack();
        }
    }

    /**
     * Displays a single Item model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        // Yii::$app->statisticComponent->trigger(MyComponent::ON_SAVE_STAT);
        // $this->createStatistic();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    // public function createStatistic()
    // {
    //     $model = new Statistic();

    //     $model->access_time = date("Y-m-d H:i:s");
    //     $model->user_ip = \Yii::$app->request->userIP;
    //     $model->user_host = \Yii::$app->request->gethostinfo();
    //     $model->path_info = \Yii::$app->request->pathInfo;
    //     $model->query_string = \Yii::$app->request->queryString;
    //     $model->save();
    // }

    /**
     * Finds the Item model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Item the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Item::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
