<?php

namespace frontend\controllers;

use frontend\models\PostSearch;
use yii\web\Controller;

/**
 * PostsController implements the CRUD actions for Post model.
 */
class PostsController extends Controller
{
    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
