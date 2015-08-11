<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $img
 * @property string $title_en
 * @property string $title_ru
 * @property string $title_am
 * @property string $description_en
 * @property string $description_ru
 * @property string $description_am
 * @property string $created_date
 * @property string $updated_date
 * @property string $images
 * @property string $attachment
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am', 'active' ], 'required'],
            [['title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am' ], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'], 
            [['images'], 'file', 'extensions' => 'jpg, gif, png', 'maxFiles' => 15], 
            [['attachment'], 'file', 'maxFiles' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'image' => Yii::t('app', 'Image'),
            'title_en' => Yii::t('app', 'Title En'),
            'title_ru' => Yii::t('app', 'Title Ru'),
            'title_am' => Yii::t('app', 'Title Am'),
            'description_en' => Yii::t('app', 'Description En'),
            'description_ru' => Yii::t('app', 'Description Ru'),
            'description_am' => Yii::t('app', 'Description Am'),
            'created_date' => Yii::t('app', 'Created Date'),
            'updated_date' => Yii::t('app', 'Updated Date'),
            'images' => Yii::t('app', 'Images'),
            'attachment' => Yii::t('app', 'Attachment'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

     public function getImageFile($image=null)
    {
        return !empty($image) ? Yii::$app->basePath . '/web/' . Yii::$app->params['uploadPath'] . '/images/' . $image->name : null;
    }

    public function getAttachmentFile($attachment=null)
    {
        return !empty($attachment) ? Yii::$app->basePath . '/web/' . Yii::$app->params['uploadPath'] . '/files/' . $attachment->name : null;
    }

    public function getImageUrl()
    {
        // return a default image placeholder if your source avatar is not found
        $image = isset($this->image) ? $this->image : 'default_img.png';
        return Yii::$app->urlManager->baseUrl . Yii::$app->params['uploadUrl'] . 'images/' . $image;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadImage()
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $image = UploadedFile::getInstance($this, 'image');
       //var_dump($image); exit;
        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $filename = explode(".", $image->name);
        $ext = end($filename);

        // generate a unique file name
        $this->image = str_replace(".{$ext}", '', $image->name) . '_' . time() . ".{$ext}";
        $image->name = $this->image;
        // the uploaded image instance
        return $image;
    }

    public function uploadImages()
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $images = UploadedFile::getInstances($this, 'images');
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
        $this->images = Json::encode($image_array);
        return $images;
    }

    public function uploadFiles()
    {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $attachments = UploadedFile::getInstances($this, 'attachment');
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
        $this->attachment = Json::encode($attachments_array);
        return $attachments;
    }
    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteImage()
    {
        $file = $this->getImageFile();

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->image = null;

        return true;
    }
}
