<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

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
            [['title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am', 'images', 'attachment'], 'required'],
            [['title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am', 'images', 'attachment'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png']
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

     public function getImageFile()
    {
        return isset($this->image) ? Yii::$app->basePath . '/web/' . Yii::$app->params['uploadPath'] . '/images/' . $this->image : null;
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

        // if no image was uploaded abort the upload
        if (empty($image)) {
            return false;
        }

        // store the source file name
        $filename = explode(".", $image->name);
        $ext = end($filename);

        // generate a unique file name
        $this->image = str_replace(".{$ext}", '', $image->name) . '_' . time() . ".{$ext}";

        // the uploaded image instance
        return $image;
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
