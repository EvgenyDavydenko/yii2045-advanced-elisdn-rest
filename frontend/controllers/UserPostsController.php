<?php

namespace frontend\controllers;

use Yii;
use common\models\Post;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;

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
     * Displays a single Post model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($user_id, $id)
    {
        return $this->render('view', [
            'user' => $this->findUserModel($user_id),
            'model' => $this->findPostModel($user_id, $id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($user_id)
    {
        $user = $this->findUserModel($user_id);

        if ($user->id != Yii::$app->user->id) {
            throw new ForbiddenHttpException('Forbidden.');
        }

        $model = new Post();
        $model->user_id = $user_id;

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $user->id, 'id' => $model->id]);
        }

        return $this->render('create', [
            'user' => $user,
            'model' => $model,
        ]);

    }
    
    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($user_id, $id)
    {
        $user = $this->findUserModel($user_id);
        $model = $this->findPostModel($user_id, $id);

        if ($model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'user_id' => $user->id, 'id' => $model->id]);
        }

        return $this->render('update', [
            'user' => $user,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($user_id, $id)
    {
        $user = $this->findUserModel($user_id);
        $model = $this->findPostModel($user_id, $id);

        $model->delete();

        return $this->redirect(['index', 'user_id' => $user->id]);
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

    /**
     * @param integer $user_id
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException
     */
    private function findPostModel($user_id, $id)
    {
        if (($model = Post::find()->where(['user_id' => $user_id])->andWhere(['id' => $id])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
