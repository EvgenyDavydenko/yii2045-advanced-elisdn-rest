<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
?>

<div class="card mt-3">
  <div class="card-header">
    <?= Html::a(Html::encode($model->username), ['view', 'id' => $model->id]); ?>
  </div>
  <div class="card-body">
    <?= Yii::$app->formatter->asNtext($model->description) ?>
</div>
</div>

