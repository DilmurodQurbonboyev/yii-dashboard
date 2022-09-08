<?php

namespace backend\models;

use yii\db\ActiveRecord;

/**
 * UserData model
 *
 * @property integer $userid
 * @property string $birth_date
 * @property string $ctzn
 * @property string $per_adr
 * @property string $pport_issue_place
 * @property string $sur_name
 * @property string $gd
 * @property string $natn
 * @property string $pport_issue_date
 * @property string $pport_expr_date
 * @property string $pport_no
 * @property string $pin
 * @property string $mob_phone_no
 * @property string $user_id
 * @property string $email
 * @property string $birth_place
 * @property string $mid_name
 * @property string $valid
 * @property string $user_type
 * @property string $ret_cd
 * @property string $first_name
 * @property string $full_name
 */
class UserData extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%user_data}}';
    }
}