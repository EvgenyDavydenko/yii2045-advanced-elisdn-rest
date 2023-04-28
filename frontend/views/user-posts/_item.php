<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

/** @var yii\web\View $this */
/** @var common\models\Post $model */
?>

<div class="card mt-3">
  <div class="card-header">
    <p class="float-right">
      <?= Html::a('Update', ['update', 'user_id' => $model->user_id, 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Delete', ['delete', 'user_id' => $model->user_id, 'id' => $model->id], [
          'class' => 'btn btn-danger',
          'data' => [
              'confirm' => 'Are you sure you want to delete this item?',
              'method' => 'post',
          ],
      ]) ?>
    </p>
    <?= Html::a(Html::encode($model->title), ['user-posts/view', 'user_id' => $model->user_id, 'id' => $model->id]); ?>
  </div>
  <div class="card-body">
    <?= Yii::$app->formatter->asNtext(StringHelper::truncateWords($model->content, 50)) ?>
</div>
</div>

