<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menus_category}}`.
 */
class m220909_141103_create_menus_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menus_category}}', [
            'id' => $this->primaryKey(),
            'status' => $this->tinyInteger(),
            'creator_id' => $this->integer()->unsigned(),
            'modifier_id' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-menus_category-creator_id',
            'menus_category',
            'creator_id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-menus_category-creator_id',
            'menus_category'
        );

        $this->dropTable('{{%menus_category}}');
    }
}
