<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GitRepo */

$this->title = 'Update Git Repo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Git Repos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="git-repo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
