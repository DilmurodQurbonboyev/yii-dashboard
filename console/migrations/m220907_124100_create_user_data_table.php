<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_data}}`.
 */
class m220907_124100_create_user_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_data}}', [
            'userid' => $this->primaryKey()->unsigned(), // int(20)
            'birth_date' => $this->string(),
            'ctzn' => $this->string(),
            'per_adr' => $this->string(),
            'pport_issue_place' => $this->string(),
            'sur_name' => $this->string(),
            'gd' => $this->string(),
            'natn' => $this->string(),
            'pport_issue_date' => $this->string(),
            'pport_expr_date' => $this->string(),
            'pport_no' => $this->string(),
            'pin' => $this->string()->unique(),
            'mob_phone_no' => $this->string(),
            'user_id' => $this->string()->unique(),
            'email' => $this->string()->unique(),
            'birth_place' => $this->string(),
            'mid_name' => $this->string(),
            'valid' => $this->string(),
            'user_type' => $this->string(),
            'ret_cd' => $this->string(),
            'first_name' => $this->string(),
            'full_name' => $this->string(),
        ]);

        $this->createIndex(
            'idx-user_data-userid', //prefix-table_name-column_name
            'user_data',
            'userid'
        );

        $this->addForeignKey(
            'fk-user-userid', // prefix-table_name-column_name
            'user_data',
            'userid',
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
            'fk-user_data-userid',
            'user_data'
        );

        $this->dropIndex(
            'idx-user_data-userid',
            'user_data'
        );

        $this->dropTable('{{%user_data}}');
    }
}
