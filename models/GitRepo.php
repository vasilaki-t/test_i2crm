<?php

namespace app\models;

/**
 * This is the model class for table "{{%tbl_git_repos}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int $repo_id
 * @property string|null $last_update
 */
class GitRepo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tbl_git_repos}}';
    }

    public function getUsers()
    {
        return $this->hasOne(GitUser::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'repo_id'], 'integer'],
            [['last_update'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'repo_id' => 'Repo ID',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @param $id
     * @return GitRepo
     */
    public static function getByRepoId($id)
    {
        $repo = self::findOne(['repo_id' => $id]);
        if ($repo == null) {
            $repo = new self();
        }
        return $repo;
    }


}
