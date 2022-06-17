<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string|null $date
 * @property int|null $customer_id
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['customer_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'customer_id' => 'Customer ID',
        ];
    }

    public function getItems()
    {
        // return Yii::$app->db->createCommand("SELECT * FROM 'order'JOIN 'order_item' ON 'order'.id = 'order_item'.order_id")->queryAll();
        return Yii::$app->db->createCommand("SELECT * FROM `order`
        JOIN order_item ON `order`.id = order_item.order_id
        JOIN item ON order_item.id = item.id")->queryAll();
    }

    public function getCustomers()
    {
        return $this->hasMany(Customer::class, ['id' => 'customer_id']);
    }
}
