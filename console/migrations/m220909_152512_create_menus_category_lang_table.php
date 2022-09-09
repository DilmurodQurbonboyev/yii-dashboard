<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menus_category_lang}}`.
 */
class m220909_152512_create_menus_category_lang_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menus_category_lang}}', [
            'menus_category_id' => $this->integer()->notNull(),
            'language' => $this->string(6),
            'title' => $this->string(),
        ]);

        $this->addForeignKey(
            'fk-menus_category_lang-menus_category_id',
            'menus_category_lang',
            'menus_category_id',
            'menus_category',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-menus_category_id-menus_category',
            'menus_category_lang',
            ['menus_category_id', 'language'],
            '',
            '',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-menus_category_lang-menus_category_id',
            'menus_category_lang',
        );
        $this->dropTable('{{%menus_category_lang}}');
    }
}
