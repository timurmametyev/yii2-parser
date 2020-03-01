<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book}}`.
 */
class m200301_155855_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey()->unsigned(),
            'category_id' => $this->integer()->unsigned(),
            'title' => $this->string()->notNull(),
            'introtext' => $this->text()->defaultValue('NULL'),
            'content' => $this->text()->defaultValue('NULL'),
            'img' => $this->string()->notNull()->defaultValue('default.jpg'),
            'createdon' => $this->string()->defaultValue('NULL'),
            'authors' => $this->string()->defaultValue('NULL'),
            'article' => $this->string()->defaultValue('NULL'),
            'status' => $this->string()->defaultValue('NULL'),
            'pages' => $this->integer()->notNull()->defaultValue('0')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%book}}');
    }
}
