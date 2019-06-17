<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;

abstract class AbstractController extends Controller
{
    /**
     * @throws NotFoundHttpException
     */
    public function pageNotFound()
    {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
