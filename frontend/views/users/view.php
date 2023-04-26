<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <?php if (Yii::$app->user->can('manageProfile', ['user' => $model])): ?>
        <p class=float-right>
            <?= Html::a('Profile', ['profile/index'], ['class' => 'btn btn-primary']) ?>
        </p>
    <?php endif; ?>

    <h1><?= Html::encode($this->title) ?></h1>    

    <div class="card">
        <div class="card-body">
            <?= Yii::$app->formatter->asNtext($model->description) ?>
        </div>
    </div>

</div>
