<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menus_category".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $status
 * @property int|null $creator_id
 * @property int|null $modifier_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class MenusCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['status', 'creator_id', 'modifier_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => 'Status',
            'creator_id' => 'Creator ID',
            'modifier_id' => 'Modifier ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
