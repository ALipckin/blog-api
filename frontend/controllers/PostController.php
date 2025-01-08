<?php

namespace frontend\controllers;


use frontend\resource\Post;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class PostController extends ActiveController
{
    public $modelClass = Post::class;
}