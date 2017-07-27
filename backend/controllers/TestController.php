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
//         $customers = Customer::find()
//             ->asArray()
//             ->all();
//         $customers = Customer::findOne(1);
//         $orders = $customers->orders;
//         $customer = Customer::findOne(1);
//         $orders = $customer->getBigOrders(250)->asArray()->all();
        //$customers = Customer::find()->with('orders')->asArray()->all();
        $customers = Customer::getGoodOrder();
        return $this->render('index', [
            'data' => $customers
        ]);
    }
}