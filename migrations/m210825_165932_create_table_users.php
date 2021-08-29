<?php

use yii\db\Migration;

/**
 * add tables user & repos
 * Class m210825_165932_create_table_users
 */
class m210825_165932_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tbl_git_users', [
            'id' => \yii\db\Schema::TYPE_PK,
            'login' => \yii\db\Schema::TYPE_STRING,
            'last_update' => \yii\db\Schema::TYPE_DATETIME,
            //TODO more data
        ]);

        $this->createTable('tbl_git_repos', [
            'id' => \yii\db\Schema::TYPE_PK,
            'repo_id' => \yii\db\Schema::TYPE_INTEGER,
            'user_id' => \yii\db\Schema::TYPE_INTEGER,
            'last_update' => \yii\db\Schema::TYPE_DATETIME,
            //TODO more dataa
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tbl_git_users');
        $this->dropTable('tbl_git_repos');

        return true;
    }

}
