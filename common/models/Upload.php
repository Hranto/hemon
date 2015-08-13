<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\helpers\Json;


class Upload extends Model
{
     public static function getImageFile($image=null)
    {
        return !empty($image) ? Yii::$app->basePath . '/web/' . Yii::$app->params['uploadPath'] . '/images/' . $image->name : null;
    }

    public static function getAttachmentFile($attachment=null)
    {
        return !empty($attachment) ? Yii::$app->basePath . '/web/' . Yii::$app->params['uploadPath'] . '/files/' . $attachment->name : null;
    }

    public static function getImageUrl()
    {
        // return a default image placeholder if your source avatar is not found
        $image = isset($model->image) ? $model->image : 'default_img.png';
        return Yii::$app->urlManager->baseUrl . Yii::$app->params['uploadUrl'] . 'images/' . $image;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public static function uploadImage($model)
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        //var_dump($model); exit;
        $image = UploadedFile::getInstance($model, 'image');
       //var_dump($image); exit;
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $filename = explode(".", $image->name);
        $ext = end($filename);

        // generate a unique file name
        $model->image = str_replace(".{$ext}", '', $image->name) . '_' . time() . ".{$ext}";
        $image->name = $model->image;
        // the uploaded image instance
        return $image;
    }

    public static function uploadImages($model)
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $images = UploadedFile::getInstances($model, 'images');
        //var_dump($images); exit;
        // if no image was uploaded abort the upload
        if (empty($images)) {
            return false;
        }

        $image_array = array();
        foreach ($images as $image) {
            // store the source file name
            $filename = explode(".", $image->name);
            $ext = end($filename);

            // generate a unique file name
            $name = str_replace(".{$ext}", '', $image->name) . '_' . time() . ".{$ext}";
            $image_array[] = $name;
            $image->name = $name;
        }
        // the uploaded image instance
        $model->images = Json::encode($image_array);
        return $images;
    }

    public static function uploadFiles($model)
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $attachments = UploadedFile::getInstances($model, 'attachment');
        //var_dump($images); exit;
        // if no image was uploaded abort the upload
        if (empty($attachments)) {
            return false;
        }

        $attachments_array = array();
        foreach ($attachments as $attachment) {
            // store the source file name
            $filename = explode(".", $attachment->name);
            $ext = end($filename);

            // generate a unique file name
            $name = str_replace(".{$ext}", '', $attachment->name) . '_' . time() . ".{$ext}";
            $attachments_array[] = $name;
            $attachment->name = $name;
        }
        // the uploaded image instance
        $model->attachment = Json::encode($attachments_array);
        return $attachments;
    }
    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public static function deleteImage($model)
    {
        $file = $model->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $model->image = null;

        return true;
    }
}
