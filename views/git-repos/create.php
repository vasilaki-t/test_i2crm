<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GitRepo */

$this->title = 'Create Git Repo';
$this->params['breadcrumbs'][] = ['label' => 'Git Repos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="git-repo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
