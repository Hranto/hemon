<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $image
 * @property string $name_en
 * @property string $name_ru
 * @property string $name_am
 * @property string $sname_en
 * @property string $sname_ru
 * @property string $sname_am
 * @property string $created_date
 * @property string $updated_date
 * @property string $position_en
 * @property string $position_ru
 * @property string $position_am
 */
class Team extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'name_en', 'name_ru', 'name_am', 'sname_en', 'sname_ru', 'sname_am', 'position_en', 'position_ru', 'position_am'], 'required'],
            [['name_en', 'name_ru', 'name_am', 'sname_en', 'sname_ru', 'sname_am', 'position_en', 'position_ru', 'position_am'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'],
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
            'name_en' => Yii::t('app', 'Name En'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'name_am' => Yii::t('app', 'Name Am'),
            'sname_en' => Yii::t('app', 'Sname En'),
            'sname_ru' => Yii::t('app', 'Sname Ru'),
            'sname_am' => Yii::t('app', 'Sname Am'),
            'created_date' => Yii::t('app', 'Created Date'),
            'updated_date' => Yii::t('app', 'Updated Date'),
            'position_en' => Yii::t('app', 'Position En'),
            'position_ru' => Yii::t('app', 'Position Ru'),
            'position_am' => Yii::t('app', 'Position Am'),
        ];
    }

    /**
     * @inheritdoc
     * @return TeamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeamQuery(get_called_class());
    }
}
