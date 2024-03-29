<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;
    public function uploadFile(UploadedFile $file): string
    {
        $filename = strtolower(md5(uniqid($file->baseName))).'.' .$file->extension;
        $file->saveAs(\Yii::getAlias('@web').'uploads/'. $filename);

        return $filename;
    }
}
