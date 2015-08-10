<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Partners]].
 *
 * @see Partners
 */
class PartnersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Partners[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Partners|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}