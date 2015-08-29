<?php

namespace common\models;
use Yii;
/**
 * This is the ActiveQuery class for [[News]].
 *
 * @see News
 */
class NewsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return News[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return News|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public static function getNewsesAndProjects($offset=null, $limit=null)
    {
        $sql = 'SELECT * FROM (SELECT projects.*, "project" as type FROM `projects` UNION SELECT news.*, " " as start_date, " " as end_date, "news" as type FROM `news` WHERE active = 1) as tab
                ORDER BY tab.created_date desc';
        if(isset($offset) && isset($limit)){
            $sql .= " LIMIT $offset,$limit";
        }

        return Yii::$app->db->createCommand($sql)->queryAll();
    }

    public static function getNewsesAndProjectsCount()
    {
        $sql = 'SELECT count(*) as count FROM (SELECT * FROM `projects` UNION SELECT `news`.*, " " as start_date, " " as end_date FROM `news` WHERE active = 1) as tab
                ORDER BY tab.created_date desc';
        return Yii::$app->db->createCommand($sql)->queryOne();
    }
}