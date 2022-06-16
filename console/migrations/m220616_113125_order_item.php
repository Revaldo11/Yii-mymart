<?php

use yii\db\Migration;

/**
 * Class m220616_113125_order_item
 */
class m220616_113125_order_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order_item', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'item_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220616_113125_order_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220616_113125_order_item cannot be reverted.\n";

        return false;
    }
    */
}
