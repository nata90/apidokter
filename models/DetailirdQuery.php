<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DetailIrd]].
 *
 * @see DetailIrd
 */
class DetailirdQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DetailIrd[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DetailIrd|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
