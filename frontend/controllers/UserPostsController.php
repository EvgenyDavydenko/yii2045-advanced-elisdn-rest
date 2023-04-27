<?php

namespace frontend\controllers;

use common\models\Post;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PostsController implements the CRUD actions for Post model.
 */
class UserPostsController extends Controller
{
    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex($user_id)
    {
        $user = $this->findUserModel($user_id);

        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where(['user_id' => $user->id])->orderBy(['id' => SORT_DESC]),
        ]);

        return $this->render('index', [
            'user' => $user,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * @param integer $user_id
     * @return User the loaded model
     * @throws NotFoundHttpException
     */
    private function findUserModel($user_id)
    {
        if (($model = User::findOne($user_id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
