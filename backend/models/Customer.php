<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%customer}}".
 *
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property integer $status
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%customer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['email'], 'string', 'max' => 64],
            [['username'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return CustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomerQuery(get_called_class());
    }
    
    public function getOrdersTest()
    {
        return $this->hasMany(OrderTest::className(), [
            'customer_id' => 'id'
        ]);
    }
    
    public function getBigOrders($total = 100)
    {
        return $this->hasMany(Order::className(), [
            'customer_id' => 'id'
        ])->where('subtotal > :total', [
            ':total' => $total
        ])->orderBy('id');
    }
    
    public static function getGoodOrder()
    {
        return self::find()->with('ordersTest')->asArray()->all();
    }
}
