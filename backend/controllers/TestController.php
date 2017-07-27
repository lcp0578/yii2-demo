<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Customer;

class TestController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $customers = Customer::find()
            ->asArray()
            ->all();
        return $this->render('index', [
            'customers' => $customers
        ]);
    }
}