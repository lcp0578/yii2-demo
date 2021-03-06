<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class HelloController extends Controller
{
    // set default action
    public $defaultAction = 'home-page';

    /**
     * (non-PHPdoc)
     * 
     * @see \yii\base\Controller::actions() 设置独立的动作
     */
    public function actions()
    {
        return [
            'error' => 'yii\web\ErrorAction',
            'view' => [
                'class' => 'yii\web\ViewAction',
                'viewPrefix' => ''
            ]
        ];
    }

    /**
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'frontend\components\ActionTimeFilter',
                'only' => [
                    'index',
                    'home-page'
                ]
            ]
        ]
        ;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionHomePage()
    {
        Yii::trace("trace-test");
        return $this->render('home-page');
    }
}