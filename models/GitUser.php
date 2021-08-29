<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_git_users}}".
 *
 * @property int $id
 * @property string|null $login
 * @property string|null $last_update
 */
class GitUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_git_users}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_update'], 'safe'],
            [['login'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'last_update' => 'Last Update',
        ];
    }
}
