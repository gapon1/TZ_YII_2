<?php

namespace app\controllers;

use app\models\ImageUpload;
use app\models\Review;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

class ProductController extends AbstractController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => ['delete' => ['POST']],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $reviews = Review::getProductReview($id);

        return $this->render('view', ['model' => $this->findModel($id), 'reviews' => $reviews]);
    }

    /**
     * @return string|Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', ['model' => $model]);
    }

    /**
     * @param $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $modelReview = $this->findModelTwo($id);

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model, 'modelReview' => $modelReview]);
    }

    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * @param integer $id
     * @return Product
     * @throws NotFoundHttpException
     */
    protected function findModel($id): Product
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        $this->pageNotFound();
    }

    /**
     * @param int $id
     * @return Review|null
     * @throws NotFoundHttpException
     */
    protected function findModelTwo(int $id): ?Review
    {
        if (($model = Review::findOne($id)) !== null) {
            return $model;
        }

        $this->pageNotFound();
    }

    /**
     * @param int $id
     * @return string|Response
     * @throws NotFoundHttpException
     */
    public function actionSetImage(int $id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost) {
            $product = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');
            $product->saveImage($model->uploadFile($file));

            return $this->redirect(['view', 'id' => $product->id]);
        }

        return $this->render('image', ['model' => $model]);
    }
}
