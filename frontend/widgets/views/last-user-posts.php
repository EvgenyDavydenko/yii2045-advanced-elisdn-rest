<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $posts common\models\Post[] */

?>
<div class="last-user-posts">
    <h2>Посты пользователя:</h2>
    <?php if ($posts): ?>
        <p>
            <?= Html::a('See All Posts', ['/user-posts/index', 'user_id' => $user->id]) ?>
        </p>
        <?php foreach ($posts as $post): ?>
            <div class="card mt-3">
                <div class="card-header">
                    <?= Html::a(Html::encode($post->title), ['/user-posts/view', 'user_id' => $post->user_id, 'id' => $post->id]) ?>
                </div>
                <div class="card-body">
                    <?= Yii::$app->formatter->asNtext(StringHelper::truncateWords($post->content, 50)) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Ничего не найдено.</p>
    <?php endif; ?>
</div>