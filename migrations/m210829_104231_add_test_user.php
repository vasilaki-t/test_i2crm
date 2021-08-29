<?php

use app\models\GitUser;
use yii\db\Migration;

/**
 * Class m210829_104231_add_test_user
 */
class m210829_104231_add_test_user extends Migration
{
    /**
     * Test users list
     * @var array
     */
    private $userList = [
        'k8s-github-robot',
        'sttts',
        'thockin',
        'deads2k',
        'mikedanese',
        'lavalamp',
        'brendandburns',
        'wojtek-t',
        'smarterclayton',
        'janetkuo',
    ];

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        foreach ($this->userList as $user) {
            $addUser = new GitUser();
            $addUser->login = $user;
            $addUser->save();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        foreach ($this->userList as $user) {
            GitUser::findOne(['login' => $user])->delete();
        }

        return true;
    }
}
