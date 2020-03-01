<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email}}`.
 */
class m200301_155931_create_email_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email}}', [
            'id' => $this->primaryKey()->unsigned(),
            'email' => $this->string()->notNull(),
            'name' => $this->string()->defaultValue('NULL'),
            'message' => $this->text()->notNull(),
            'phone' => $this->string(20)->defaultValue('NULL')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%email}}');
    }
}
