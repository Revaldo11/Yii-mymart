<?php

use yii\db\Migration;

/**
 * Class m220616_112831_order
 */
class m220616_112831_order extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime(),
            'customer_id' => $this->integer(),
        ],);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220616_112831_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220616_112831_order cannot be reverted.\n";

        return false;
    }
    */
}
