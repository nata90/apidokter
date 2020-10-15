<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Headerrawatinap]].
 *
 * @see Headerrawatinap
 */
class HeaderrawatinapQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Headerrawatinap[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Headerrawatinap|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
