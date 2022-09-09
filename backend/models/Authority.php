<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "authorities".
 *
 * @property int $id
 * @property string|null $code
 * @property string|null $title
 * @property int|null $status
 * @property int|null $authority_type
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $creator_id
 * @property int|null $modifier_id
 *
 * @property User $creator
 */
class Authority extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authorities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string'],
            [['status', 'authority_type', 'creator_id', 'modifier_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['code'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['creator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'title' => 'Title',
            'status' => 'Status',
            'authority_type' => 'Authority Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'creator_id' => 'Creator ID',
            'modifier_id' => 'Modifier ID',
        ];
    }

    /**
     * Gets query for [[Creator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(User::class, ['id' => 'creator_id']);
    }
}
