<?php

use yii\db\Migration;

/**
 * Class m220616_113111_customer
 */
class m220616_113111_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220616_113111_customer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220616_113111_customer cannot be reverted.\n";

        return false;
    }
    */
}
