<?php

namespace app\components;

use yii\base\Component;
use frontend\models\Statistic;

class MyComponent extends Component
{

    const ON_SAVE_STAT = "save-stat";

    public static function statisticHandler()
    {
        $model = new Statistic();

        $model->access_time = date("Y-m-d H:i:s");
        $model->user_ip = \Yii::$app->request->userIP;
        $model->user_host = \Yii::$app->request->getHostInfo();
        $model->path_info = \Yii::$app->request->pathInfo;
        $model->query_string = \Yii::$app->request->queryString;

        $model->save();
    }
}
