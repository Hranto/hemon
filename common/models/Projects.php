<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $image
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
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am', 'active'], 'required'],
            [['title_en', 'title_ru', 'title_am', 'description_en', 'description_ru', 'description_am', 'images'], 'string'],
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
     * @return ProjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectsQuery(get_called_class());
    }
}
