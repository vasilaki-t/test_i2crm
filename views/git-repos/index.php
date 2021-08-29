<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Git Repos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="git-repo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Git Repo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'repo_id',
            [
                    'label' => 'User',
                    'value' => function($model){return $model->users->login;},
            ],
            'last_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
