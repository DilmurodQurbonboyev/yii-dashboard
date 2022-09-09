<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%authorities}}`.
 */
class m220909_052647_create_authorities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authorities}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'title' => $this->text(),
            'status' => $this->tinyInteger(),
            'authority_type' => $this->integer()->defaultValue(0),
            'creator_id' => $this->integer()->unsigned(),
            'modifier_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-authorities-creator_id',
            'authorities',
            'creator_id'
        );

        $this->addForeignKey(
            'fk-user-creator_id', // prefix-table_name-column_name
            'authorities',
            'creator_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user-creator_id', // prefix-table_name-column_name
            'authorities'
        );

        $this->dropIndex(
            'idx-authorities-creator_id',
            'authorities'
        );

        $this->dropTable('{{%authorities}}');
    }
}
